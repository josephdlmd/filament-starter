<?php

use App\Enums\Role;
use App\Filament\Pages\ManageGeneralSettings;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;
use App\Settings\GeneralSettings;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function () {
    actingAsRole(Role::Admin);
});

it('renders the admin login page for guests', function () {
    auth()->logout();

    $this->get('/admin/login')->assertOk();
});

it('renders the profile page', function () {
    $this->get('/admin/profile')->assertOk();
});

it('lists users', function () {
    $users = User::factory()->count(3)->create();

    Livewire::test(ListUsers::class)
        ->assertOk()
        ->assertCanSeeTableRecords($users);
});

it('saves an avatar, tags and roles on a user', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    $staffRoleId = Spatie\Permission\Models\Role::findByName(Role::Staff->value)->getKey();

    Livewire::test(EditUser::class, ['record' => $user->getRouteKey()])
        ->fillForm([
            'avatar' => [UploadedFile::fake()->image('avatar.png')],
            'tags' => ['admin', 'finance'],
            'roles' => [$staffRoleId],
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $user->refresh();

    expect($user->getMedia('avatars'))->toHaveCount(1)
        ->and($user->tags->pluck('name')->sort()->values()->all())->toBe(['admin', 'finance'])
        ->and($user->hasRole(Role::Staff->value))->toBeTrue();
});

it('updates the general settings and uses the site name as the brand', function () {
    Livewire::test(ManageGeneralSettings::class)
        ->fillForm(['site_name' => 'DL Group'])
        ->call('save')
        ->assertHasNoFormErrors();

    expect(app(GeneralSettings::class)->refresh()->site_name)->toBe('DL Group');

    $this->get('/admin')->assertOk()->assertSee('DL Group');
});
