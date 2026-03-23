<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class ReservationLog extends Model
{
    public $timestamps = false;

    /** @var list<string> */
    protected $fillable = [
        'logged_at',
        'entry_id',
        'identifier',
        'action',
        'details',
    ];
}
