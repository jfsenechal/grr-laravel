<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class AreaPeriod extends Model
{
    public $timestamps = false;

    /** @var list<string> */
    protected $fillable = [
        'area_id',
        'period_number',
        'period_name',
    ];

    /** @return BelongsTo<Area, $this> */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
