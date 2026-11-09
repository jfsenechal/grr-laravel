<?php

declare(strict_types=1);

namespace App\Console;

interface UserDirectory
{
    /**
     * Open the connection to the directory; throws when it is unreachable.
     */
    public function connect(): void;

    public function existsBySamAccountName(string $samAccountName): bool;
}
