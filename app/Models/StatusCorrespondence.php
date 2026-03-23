<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class StatusCorrespondence extends Model
{
    public $timestamps = false;

    /** @var list<string> */
    protected $fillable = [
        'function_code',
        'function_label',
        'grr_status',
    ];
}
