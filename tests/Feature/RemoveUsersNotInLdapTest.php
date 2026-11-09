<?php

declare(strict_types=1);

use App\Console\UserDirectory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

beforeEach(function (): void {
    Schema::create('grr_utilisateurs', function (Blueprint $table): void {
        $table->string('login', 190)->primary();
        $table->string('source', 10)->default('local');
    });

    Schema::dropIfExists('grr_j_user_room');
    Schema::create('grr_j_user_room', function (Blueprint $table): void {
        $table->string('login', 190);
        $table->integer('id_room');
    });

    DB::table('grr_utilisateurs')->insert([
        ['login' => 'present', 'source' => 'ext'],
        ['login' => 'gone', 'source' => 'ext'],
        ['login' => 'localuser', 'source' => 'local'],
    ]);

    DB::table('grr_j_user_room')->insert([
        ['login' => 'present', 'id_room' => 1],
        ['login' => 'gone', 'id_room' => 1],
    ]);

    $this->app->instance(UserDirectory::class, new class implements UserDirectory
    {
        public function connect(): void {}

        public function existsBySamAccountName(string $samAccountName): bool
        {
            return $samAccountName === 'present';
        }
    });
});

it('only lists missing users without force', function (): void {
    $this->artisan('app:remove-users-not-in-ldap')
        ->expectsOutputToContain('2 external users checked, 1 not found in LDAP.')
        ->assertSuccessful();

    expect(DB::table('grr_utilisateurs')->count())->toBe(3);
});

it('removes external users missing from ldap and their rights with force', function (): void {
    $this->artisan('app:remove-users-not-in-ldap', ['--force' => true])
        ->assertSuccessful();

    expect(DB::table('grr_utilisateurs')->pluck('login')->sort()->values()->all())
        ->toBe(['localuser', 'present'])
        ->and(DB::table('grr_j_user_room')->pluck('login')->all())
        ->toBe(['present']);
});

it('fails without deleting anything when ldap is unreachable', function (): void {
    $this->app->instance(UserDirectory::class, new class implements UserDirectory
    {
        public function connect(): void
        {
            throw new RuntimeException('Unable to bind to LDAP');
        }

        public function existsBySamAccountName(string $samAccountName): bool
        {
            return false;
        }
    });

    $this->artisan('app:remove-users-not-in-ldap', ['--force' => true])
        ->assertFailed();

    expect(DB::table('grr_utilisateurs')->count())->toBe(3);
});

it('is scheduled weekly with force', function (): void {
    $event = collect(app(Illuminate\Console\Scheduling\Schedule::class)->events())
        ->first(fn (Illuminate\Console\Scheduling\Event $event): bool => str_contains((string) $event->command, 'app:remove-users-not-in-ldap --force'));

    expect($event)->not->toBeNull()
        ->and($event->expression)->toBe('0 0 * * 0');
});
