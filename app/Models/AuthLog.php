<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class AuthLog extends Model
{
    public $timestamps = false;

    /** @var list<string> */
    protected $fillable = [
        'login',
        'start',
        'session_id',
        'remote_addr',
        'user_agent',
        'referer',
        'autoclose',
        'end',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start' => 'datetime',
            'end' => 'datetime',
        ];
    }
}
