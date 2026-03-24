<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class EntryFile extends Model
{
    public $timestamps = false;

    protected $table = 'grr_files';

    /** @var list<string> */
    protected $fillable = [
        'entry_id',
        'file_name',
        'public_name',
    ];

    /** @return BelongsTo<Entry, $this> */
    public function entry(): BelongsTo
    {
        return $this->belongsTo(Entry::class);
    }
}
