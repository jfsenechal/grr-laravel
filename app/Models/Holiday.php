<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Holiday extends Model
{
    public $timestamps = false;

    /** @var list<string> */
    protected $fillable = [
        'day',
    ];
}
