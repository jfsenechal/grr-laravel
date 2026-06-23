<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\password;

#[Signature('app:set-user-password {email : The email of the user} {--password= : The new password (prompted securely if omitted)}')]
#[Description('Set (hash) a password for an existing user')]
final class SetUserPassword extends Command
{
    public function handle(): int
    {
        $user = User::query()->where('email', $this->argument('email'))->first();

        if (! $user instanceof User) {
            $this->error("No user found with email [{$this->argument('email')}].");

            return self::FAILURE;
        }

        $plainPassword = $this->option('password') ?? password(
            label: 'New password',
            required: true,
        );

        $validator = Validator::make(
            ['password' => $plainPassword],
            ['password' => ['required', Password::min(12)]],
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                $this->error($message);
            }

            return self::FAILURE;
        }

        $user->update(['password' => $plainPassword]);

        $this->info("Password updated for {$user->email}.");

        return self::SUCCESS;
    }
}
