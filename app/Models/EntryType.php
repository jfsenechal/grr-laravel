<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class EntryType extends Model
{
    /** @var list<string> */
    protected $fillable = [
        'type_name',
        'order_display',
        'color',
        'color_hex',
        'text_color',
        'icon_color',
        'type_letter',
        'available',
    ];

    /** @return BelongsToMany<Area, $this> */
    public function areas(): BelongsToMany
    {
        return $this->belongsToMany(Area::class, 'area_entry_type');
    }
}
