<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Participant extends Model
{
    public $timestamps = false;

    protected $table = 'grr_participants';

    /** @var list<string> */
    protected $fillable = [
        'idresa',
        'cree_par',
        'beneficiaire',
        'beneficiaire_ext',
        'moderation',
    ];

    /** @return BelongsTo<Entry, $this> */
    public function entry(): BelongsTo
    {
        return $this->belongsTo(Entry::class);
    }
}
