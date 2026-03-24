<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class EntryModeration extends Model
{
    public $timestamps = false;

    protected $table = 'grr_entry_moderate';

    /** @var list<string> */
    protected $fillable = [
        'moderator_login',
        'moderation_motivation',
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
    ];

    /** @return BelongsTo<Entry, $this> */
    public function entry(): BelongsTo
    {
        return $this->belongsTo(Entry::class);
    }
}
