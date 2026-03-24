<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Setting extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $table = 'grr_setting';

    protected $primaryKey = 'name';

    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'name',
        'value',
    ];
}
