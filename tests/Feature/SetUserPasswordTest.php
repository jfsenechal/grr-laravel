<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('sets a new password for an existing user', function () {
    $user = User::factory()->create();

    $this->artisan('app:set-user-password', [
        'email' => $user->email,
        '--password' => 'super-secret-pass',
    ])->assertSuccessful();

    expect(Hash::check('super-secret-pass', $user->refresh()->password))->toBeTrue();
});

it('fails when the user does not exist', function () {
    $this->artisan('app:set-user-password', [
        'email' => 'missing@example.com',
        '--password' => 'super-secret-pass',
    ])->assertFailed();
});

it('rejects passwords shorter than 12 characters', function () {
    $user = User::factory()->create();

    $this->artisan('app:set-user-password', [
        'email' => $user->email,
        '--password' => 'short',
    ])->assertFailed();

    expect(Hash::check('short', $user->refresh()->password))->toBeFalse();
});
