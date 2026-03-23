<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Site extends Model
{
    public $timestamps = false;

    /** @var list<string> */
    protected $fillable = [
        'site_code',
        'site_name',
        'access',
        'address_line1',
        'address_line2',
        'address_line3',
        'postal_code',
        'city',
        'country',
        'phone',
        'fax',
    ];

    /** @return BelongsToMany<Area, $this> */
    public function areas(): BelongsToMany
    {
        return $this->belongsToMany(Area::class, 'area_site');
    }

    /** @return BelongsToMany<User, $this> */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'site_user');
    }

    /** @return BelongsToMany<Group, $this> */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_site');
    }

    /** @return BelongsToMany<User, $this> */
    public function adminUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'site_user_admin');
    }
}
