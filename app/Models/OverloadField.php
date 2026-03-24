<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class OverloadField extends Model
{
    public $timestamps = false;

    protected $table = 'grr_overload';

    /** @var list<string> */
    protected $fillable = [
        'id_area',
        'fieldname',
        'fieldtype',
        'fieldlist',
        'obligatoire',
        'affichage',
        'confidentiel',
        'overload_mail',
        'mail_spec',
    ];

    /** @return BelongsTo<Area, $this> */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
