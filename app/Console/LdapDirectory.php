<?php

declare(strict_types=1);

namespace App\Console;

use LDAP\Connection;
use RuntimeException;

/**
 * Minimal read-only access to the LDAP / Active Directory configured in config/ldap.php.
 */
final class LdapDirectory implements UserDirectory
{
    private ?Connection $connection = null;

    public function __destruct()
    {
        if ($this->connection instanceof Connection) {
            @ldap_unbind($this->connection);
        }
    }

    public function connect(): void
    {
        if ($this->connection instanceof Connection) {
            return;
        }

        if (! function_exists('ldap_connect')) {
            throw new RuntimeException('The PHP ldap extension is not installed.');
        }

        $port = (int) config('ldap.port');
        $useSsl = config('ldap.ssl') || $port === 636;
        $scheme = $useSsl ? 'ldaps' : 'ldap';

        $uri = implode(' ', array_map(
            fn (string $host): string => "{$scheme}://{$host}:{$port}",
            array_filter((array) config('ldap.hosts')),
        ));

        $connection = ldap_connect($uri);

        if ($connection === false) {
            throw new RuntimeException("Invalid LDAP uri [{$uri}].");
        }

        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($connection, LDAP_OPT_NETWORK_TIMEOUT, (int) config('ldap.timeout'));

        if (! $useSsl && (config('ldap.tls') || config('ldap.starttls')) && ! @ldap_start_tls($connection)) {
            throw new RuntimeException('Unable to start TLS: '.ldap_error($connection));
        }

        if (! @ldap_bind($connection, config('ldap.username'), config('ldap.password'))) {
            throw new RuntimeException('Unable to bind to LDAP: '.ldap_error($connection));
        }

        $this->connection = $connection;
    }

    public function existsBySamAccountName(string $samAccountName): bool
    {
        $this->connect();

        $filter = sprintf(
            '(&(objectClass=user)(sAMAccountName=%s))',
            ldap_escape($samAccountName, '', LDAP_ESCAPE_FILTER),
        );

        $result = @ldap_search($this->connection, (string) config('ldap.base_dn'), $filter, ['samaccountname'], 0, 1);

        if ($result === false) {
            throw new RuntimeException("LDAP search failed for [{$samAccountName}]: ".ldap_error($this->connection));
        }

        return ldap_count_entries($this->connection, $result) > 0;
    }
}
