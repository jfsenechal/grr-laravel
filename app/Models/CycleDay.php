<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class CycleDay extends Model
{
    public $timestamps = false;

    protected $table = 'grr_calendrier_jours_cycle';

    /** @var list<string> */
    protected $fillable = [
        'day',
        'label',
    ];
}
