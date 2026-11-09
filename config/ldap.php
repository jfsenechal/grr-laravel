<?php

declare(strict_types=1);

return [
    'hosts' => explode(' ', (string) env('LDAP_DEFAULT_HOSTS', '127.0.0.1')),
    'username' => env('LDAP_DEFAULT_USERNAME'),
    'password' => env('LDAP_DEFAULT_PASSWORD'),
    'port' => (int) env('LDAP_DEFAULT_PORT', 389),
    'base_dn' => env('LDAP_DEFAULT_BASE_DN', ''),
    'timeout' => (int) env('LDAP_DEFAULT_TIMEOUT', 5),
    'ssl' => (bool) env('LDAP_DEFAULT_SSL', false),
    'tls' => (bool) env('LDAP_DEFAULT_TLS', false),
    'starttls' => (bool) env('LDAP_DEFAULT_STARTTLS', false),
];
