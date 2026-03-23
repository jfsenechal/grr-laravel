<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Repeat extends Model
{
    public $timestamps = false;

    /** @var list<string> */
    protected $fillable = [
        'start_time',
        'end_time',
        'rep_type',
        'end_date',
        'rep_opt',
        'room_id',
        'create_by',
        'beneficiaire_ext',
        'beneficiaire',
        'name',
        'type',
        'description',
        'rep_num_weeks',
        'overload_desc',
        'days',
        'mail',
        'max_participant_count',
    ];

    /** @return BelongsTo<Room, $this> */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    /** @return HasMany<Entry, $this> */
    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class);
    }
}
