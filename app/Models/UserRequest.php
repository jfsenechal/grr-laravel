<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class UserRequest extends Model
{
    protected $table = 'grr_utilisateurs_demandes';

    /** @var list<string> */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'mdp',
        'commentaire',
        'datedemande',
        'etat',
        'gestionnaire',
        'datechoix',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'datedemande' => 'date',
            'datechoix' => 'date',
            'mdp' => 'hashed',
        ];
    }
}
