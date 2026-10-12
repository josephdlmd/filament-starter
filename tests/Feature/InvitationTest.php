<?php

use App\Enums\Role;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;
use App\Notifications\UserInvitation;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;

it('invites a user by email, with no password until they set their own', function () {
    Notification::fake();
    actingAsRole(Role::Admin);

    Livewire::test(ListUsers::class)
        ->callAction('invite', data: ['name' => 'Ben Cruz', 'email' => 'ben@example.com', 'roles' => [Role::Staff->value]])
        ->assertHasNoActionErrors()
        ->assertNotified('Invitation sent to ben@example.com');

    $user = User::where('email', 'ben@example.com')->sole();

    expect($user->password)->toBeNull()
        ->and($user->invited_at)->not->toBeNull()
        ->and($user->hasRole(Role::Staff->value))->toBeTrue();
    Notification::assertSentTo($user, UserInvitation::class, fn (UserInvitation $mail): bool => str_contains($mail->toMail($user)->actionUrl, '/admin/invitation/'.$user->id));
});

it('lets the invited user open their link, and stops it once withdrawn', function () {
    $user = User::forceCreate(['name' => 'Ben Cruz', 'email' => 'ben@example.com', 'password' => null, 'invited_at' => now()]);
    $link = (new UserInvitation)->toMail($user)->actionUrl;

    $this->get($link)->assertOk()->assertSee('Set your password')->assertSee('At least 15 characters');

    actingAsRole(Role::Admin);
    Livewire::test(ListUsers::class)->callTableAction('withdraw', $user);
    auth()->logout();

    expect(User::find($user->id))->toBeNull();
    $this->get($link)->assertRedirect(filament()->getLoginUrl());
});
