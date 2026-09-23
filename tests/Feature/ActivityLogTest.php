<?php

use App\Enums\Role;
use App\Filament\Pages\ManageGeneralSettings;
use App\Filament\Resources\Activities\Pages\ListActivities;
use App\Filament\Resources\Activities\Pages\ViewActivity;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Models\User;
use Livewire\Livewire;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role as RoleModel;

beforeEach(function () {
    $this->admin = actingAsRole(Role::Admin);
});

it('logs identity changes on users without logging the password', function () {
    $user = User::factory()->create(['name' => 'Before']);

    $user->update(['name' => 'After', 'password' => 'a-new-secret-password']);

    $activity = Activity::query()->where('event', 'updated')->latest('id')->firstOrFail();

    expect($activity->subject->is($user))->toBeTrue()
        ->and($activity->causer->is($this->admin))->toBeTrue()
        ->and($activity->attribute_changes->get('old'))->toBe(['name' => 'Before'])
        ->and($activity->attribute_changes->get('attributes'))->toBe(['name' => 'After'])
        ->and(json_encode($activity->toArray()))->not->toContain('a-new-secret-password');
});

it('logs role changes made in the panel', function () {
    $user = User::factory()->create();

    Livewire::test(EditUser::class, ['record' => $user->getRouteKey()])
        ->fillForm(['roles' => [RoleModel::findByName(Role::Viewer->value)->getKey()]])
        ->call('save')
        ->assertHasNoFormErrors();

    $activity = Activity::query()->where('event', 'roles_updated')->sole();

    expect($activity->attribute_changes->get('old'))->toBe(['roles' => []])
        ->and($activity->attribute_changes->get('attributes'))->toBe(['roles' => [Role::Viewer->value]]);
});

it('logs settings changes', function () {
    Livewire::test(ManageGeneralSettings::class)
        ->fillForm(['site_name' => 'Renamed'])
        ->call('save');

    $activity = Activity::query()->where('event', 'settings_updated')->sole();

    expect($activity->attribute_changes->get('attributes'))->toBe(['site_name' => 'Renamed'])
        ->and($activity->causer->is($this->admin))->toBeTrue();
});

it('lists and shows activity to admins', function () {
    User::factory()->create();
    $activity = Activity::query()->latest('id')->firstOrFail();

    Livewire::test(ListActivities::class)
        ->assertOk()
        ->assertCanSeeTableRecords([$activity]);

    Livewire::test(ViewActivity::class, ['record' => $activity->getKey()])
        ->assertOk();
});
