<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class OverloadField extends Model
{
    public $timestamps = false;

    /** @var list<string> */
    protected $fillable = [
        'area_id',
        'field_name',
        'field_type',
        'field_list',
        'required',
        'display',
        'confidential',
        'overload_mail',
        'mail_spec',
    ];

    /** @return BelongsTo<Area, $this> */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
