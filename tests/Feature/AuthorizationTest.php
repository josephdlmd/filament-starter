<?php

use App\Enums\Role;
use App\Filament\Pages\ManageGeneralSettings;
use App\Filament\Resources\Activities\ActivityResource;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\UserResource;
use App\Models\User;

it('denies panel access to users without a role', function () {
    $this->actingAs(User::factory()->create());

    $this->get('/admin')->assertForbidden();
});

it('lets every role into the panel', function (Role $role) {
    actingAsRole($role);

    $this->get('/admin')->assertOk();
})->with(Role::cases());

it('lets admins reach users, settings and the activity log', function () {
    actingAsRole(Role::Admin);

    $this->get(UserResource::getUrl('index'))->assertOk();
    $this->get(UserResource::getUrl('create'))->assertOk();
    $this->get(ManageGeneralSettings::getUrl())->assertOk();
    $this->get(ActivityResource::getUrl('index'))->assertOk();
});

it('lets staff list users but not create or edit them', function () {
    actingAsRole(Role::Staff);
    $other = User::factory()->create();

    $this->get(UserResource::getUrl('index'))->assertOk();
    $this->get(CreateUser::getUrl())->assertForbidden();
    $this->get(EditUser::getUrl(['record' => $other]))->assertForbidden();
});

it('keeps settings and the activity log away from staff and viewers', function (Role $role) {
    actingAsRole($role);

    $this->get(ManageGeneralSettings::getUrl())->assertForbidden();
    $this->get(ActivityResource::getUrl('index'))->assertForbidden();
})->with([Role::Staff, Role::Viewer]);

it('keeps users away from viewers', function () {
    actingAsRole(Role::Viewer);

    $this->get(UserResource::getUrl('index'))->assertForbidden();
});

it('stops an admin from deleting their own account', function () {
    $admin = actingAsRole(Role::Admin);

    expect($admin->can('delete', $admin))->toBeFalse()
        ->and($admin->can('delete', User::factory()->create()))->toBeTrue();
});
