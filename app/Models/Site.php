<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Site extends Model
{
    public $timestamps = false;

    protected $table = 'grr_site';

    /** @var list<string> */
    protected $fillable = [
        'sitecode',
        'sitename',
        'access',
        'adresse_ligne1',
        'adresse_ligne2',
        'adresse_ligne3',
        'cp',
        'ville',
        'pays',
        'tel',
        'fax',
    ];

    /** @return BelongsToMany<Area, $this> */
    public function areas(): BelongsToMany
    {
        return $this->belongsToMany(Area::class, 'grr_j_site_area');
    }

    /** @return BelongsToMany<User, $this> */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'grr_j_user_site');
    }

    /** @return BelongsToMany<Group, $this> */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'grr_j_group_site');
    }

    /** @return BelongsToMany<User, $this> */
    public function adminUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'grr_j_useradmin_site');
    }
}
