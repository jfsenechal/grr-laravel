<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class StatusCorrespondence extends Model
{
    public $timestamps = false;

    protected $table = 'grr_correspondance_statut';

    /** @var list<string> */
    protected $fillable = [
        'code_fonction',
        'libelle_fonction',
        'statut_grr',
    ];
}
