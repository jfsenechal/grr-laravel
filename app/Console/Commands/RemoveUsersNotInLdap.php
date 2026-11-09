<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Console\UserDirectory;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Throwable;

#[Signature('app:remove-users-not-in-ldap {--force : Actually delete the users (otherwise dry run)}')]
#[Description('Remove external users (source = ext) from grr_utilisateurs whose login no longer exists in LDAP (sAMAccountName)')]
final class RemoveUsersNotInLdap extends Command
{
    /**
     * Legacy tables holding user rights keyed by login.
     *
     * @var list<string>
     */
    private const array RELATED_TABLES = [
        'grr_j_mailuser_room',
        'grr_j_useradmin_area',
        'grr_j_useradmin_site',
        'grr_j_userbook_room',
        'grr_j_user_area',
        'grr_j_user_room',
        'grr_j_user_site',
        'grr_utilisateurs_groupes',
    ];

    public function handle(UserDirectory $directory): int
    {
        try {
            $directory->connect();
        } catch (Throwable $throwable) {
            $this->error($throwable->getMessage());

            return self::FAILURE;
        }

        /** @var list<string> $logins */
        $logins = DB::table('grr_utilisateurs')
            ->where('source', 'ext')
            ->orderBy('login')
            ->pluck('login')
            ->all();

        $missing = [];

        foreach ($logins as $login) {
            try {
                if (! $directory->existsBySamAccountName($login)) {
                    $missing[] = $login;
                }
            } catch (Throwable $throwable) {
                $this->error($throwable->getMessage());

                return self::FAILURE;
            }
        }

        $this->info(sprintf('%d external users checked, %d not found in LDAP.', count($logins), count($missing)));

        if ($missing === []) {
            return self::SUCCESS;
        }

        $this->table(['login'], array_map(fn (string $login): array => [$login], $missing));

        if (! $this->option('force')) {
            $this->warn('Dry run: nothing deleted. Use --force to remove these users.');

            return self::SUCCESS;
        }

        DB::transaction(function () use ($missing): void {
            foreach (array_chunk($missing, 500) as $chunk) {
                foreach (self::RELATED_TABLES as $table) {
                    if (Schema::hasTable($table)) {
                        DB::table($table)->whereIn('login', $chunk)->delete();
                    }
                }

                DB::table('grr_utilisateurs')
                    ->where('source', 'ext')
                    ->whereIn('login', $chunk)
                    ->delete();
            }
        });

        $this->info(sprintf('%d users removed.', count($missing)));

        return self::SUCCESS;
    }
}
