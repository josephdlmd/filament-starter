<?php

use App\Filament\Pages\ManageGeneralSettings;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;
use App\Settings\GeneralSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('renders the admin login page for guests', function () {
    auth()->logout();

    $this->get('/admin/login')->assertOk();
});

it('lists users', function () {
    $users = User::factory()->count(3)->create();

    Livewire::test(ListUsers::class)
        ->assertOk()
        ->assertCanSeeTableRecords($users);
});

it('saves an avatar and tags on a user', function () {
    Storage::fake('public');
    $user = User::factory()->create();

    Livewire::test(EditUser::class, ['record' => $user->getRouteKey()])
        ->fillForm([
            'avatar' => [UploadedFile::fake()->image('avatar.png')],
            'tags' => ['admin', 'finance'],
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $user->refresh();

    expect($user->getMedia('avatars'))->toHaveCount(1)
        ->and($user->tags->pluck('name')->sort()->values()->all())->toBe(['admin', 'finance']);
});

it('updates the general settings', function () {
    Livewire::test(ManageGeneralSettings::class)
        ->fillForm(['site_name' => 'DL Group'])
        ->call('save')
        ->assertHasNoFormErrors();

    expect(app(GeneralSettings::class)->refresh()->site_name)->toBe('DL Group');
});
