<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Module extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $table = 'grr_modulesext';

    protected $primaryKey = 'name';

    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'name',
        'is_active',
        'version',
    ];
}
