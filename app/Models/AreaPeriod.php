<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class AreaPeriod extends Model
{
    public $timestamps = false;

    protected $table = 'grr_area_periodes';

    /** @var list<string> */
    protected $fillable = [
        'id_area',
        'num_periode',
        'nom_periode',
    ];

    /** @return BelongsTo<Area, $this> */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
