<?php

use App\Models\User;
use Illuminate\Database\LazyLoadingViolationException;

it('throws on lazy loading outside production', function () {
    User::factory()->count(2)->create();

    $users = User::all();

    expect(fn () => $users->first()->roles)->toThrow(LazyLoadingViolationException::class);
});
