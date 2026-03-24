<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class EntryType extends Model
{
    public $timestamps = false;

    protected $table = 'grr_type_area';

    /** @var list<string> */
    protected $fillable = [
        'type_name',
        'order_display',
        'couleur',
        'couleurhexa',
        'couleurtexte',
        'couleuricone',
        'type_letter',
        'disponible',
    ];

    /** @return BelongsToMany<Area, $this> */
    public function areas(): BelongsToMany
    {
        return $this->belongsToMany(Area::class, 'grr_j_type_area');
    }
}
