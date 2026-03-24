<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Area extends Model
{
    public $timestamps = false;

    protected $table = 'grr_area';

    /** @var list<string> */
    protected $fillable = [
        'area_name',
        'access',
        'order_display',
        'ip_adr',
        'morningstarts_area',
        'eveningends_area',
        'duree_max_resa_area',
        'resolution_area',
        'eveningends_minutes_area',
        'weekstarts_area',
        'twentyfourhour_format_area',
        'calendar_default_values',
        'enable_periods',
        'display_days',
        'id_type_par_defaut',
        'duree_par_defaut_reservation_area',
        'max_booking',
        'user_right',
        'access_file',
        'upload_file',
    ];

    /** @return BelongsToMany<Site, $this> */
    public function sites(): BelongsToMany
    {
        return $this->belongsToMany(Site::class, 'grr_j_site_area');
    }

    /** @return HasMany<Room, $this> */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    /** @return HasMany<OverloadField, $this> */
    public function overloadFields(): HasMany
    {
        return $this->hasMany(OverloadField::class);
    }

    /** @return HasMany<AreaPeriod, $this> */
    public function areaPeriods(): HasMany
    {
        return $this->hasMany(AreaPeriod::class);
    }

    /** @return BelongsToMany<Group, $this> */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'grr_j_group_area');
    }

    /** @return BelongsToMany<User, $this> */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'grr_j_user_area');
    }

    /** @return BelongsToMany<User, $this> */
    public function adminUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'grr_j_useradmin_area');
    }

    /** @return BelongsToMany<EntryType, $this> */
    public function entryTypes(): BelongsToMany
    {
        return $this->belongsToMany(EntryType::class, 'grr_j_type_area');
    }
}
