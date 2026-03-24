<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class UserRequest extends Model
{
    protected $table = 'grr_utilisateurs_demandes';

    /** @var list<string> */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'phone',
        'password',
        'comment',
        'requested_at',
        'status',
        'manager',
        'decided_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'requested_at' => 'date',
            'decided_at' => 'date',
            'password' => 'hashed',
        ];
    }
}
