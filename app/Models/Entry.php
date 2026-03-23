<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Entry extends Model
{
    public $timestamps = false;

    /** @var list<string> */
    protected $fillable = [
        'start_time',
        'end_time',
        'entry_type',
        'repeat_id',
        'room_id',
        'create_by',
        'beneficiaire_ext',
        'beneficiaire',
        'name',
        'type',
        'description',
        'status_entry',
        'option_reservation',
        'overload_desc',
        'moderate',
        'days',
        'key',
        'mail',
        'max_participant_count',
        'deleted',
    ];

    /** @return BelongsTo<Room, $this> */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    /** @return BelongsTo<Repeat, $this> */
    public function repeat(): BelongsTo
    {
        return $this->belongsTo(Repeat::class);
    }

    /** @return HasMany<EntryFile, $this> */
    public function entryFiles(): HasMany
    {
        return $this->hasMany(EntryFile::class);
    }

    /** @return HasMany<Participant, $this> */
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    /** @return HasMany<EntryModeration, $this> */
    public function entryModerations(): HasMany
    {
        return $this->hasMany(EntryModeration::class);
    }
}
