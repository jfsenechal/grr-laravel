<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Page extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = 'slug';

    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'slug',
        'title',
        'content',
        'is_system',
        'minimum_status',
        'link',
        'open_in_new_tab',
        'sort_order',
        'position',
    ];
}
