<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class ReservationLog extends Model
{
    public $timestamps = false;

    protected $table = 'grr_log_resa';

    /** @var list<string> */
    protected $fillable = [
        'date',
        'idresa',
        'identifiant',
        'action',
        'infoscomp',
    ];
}
