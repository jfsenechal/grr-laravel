<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class AuthLog extends Model
{
    public $timestamps = false;

    protected $table = 'grr_log';

    /** @var list<string> */
    protected $fillable = [
        'LOGIN',
        'START',
        'SESSION_ID',
        'REMOTE_ADDR',
        'USER_AGENT',
        'REFERER',
        'AUTOCLOSE',
        'END',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'START' => 'datetime',
            'END' => 'datetime',
        ];
    }
}
