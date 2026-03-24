<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Page extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $table = 'grr_page';

    protected $primaryKey = 'nom';

    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'nom',
        'titre',
        'valeur',
        'systeme',
        'statutmini',
        'lien',
        'nouveauonglet',
        'ordre',
        'emplacement',
    ];
}
