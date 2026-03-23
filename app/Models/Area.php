<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Area extends Model
{
    /** @var list<string> */
    protected $fillable = [
        'area_name',
        'access',
        'order_display',
        'ip_adr',
        'morning_starts_area',
        'evening_ends_area',
        'max_booking_duration_area',
        'resolution_area',
        'evening_ends_minutes_area',
        'week_starts_area',
        'twentyfourhour_format_area',
        'calendar_default_values',
        'enable_periods',
        'display_days',
        'default_type_id',
        'default_booking_duration_area',
        'max_booking',
        'user_right',
        'access_file',
        'upload_file',
    ];

    /** @return BelongsToMany<Site, $this> */
    public function sites(): BelongsToMany
    {
        return $this->belongsToMany(Site::class, 'area_site');
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
        return $this->belongsToMany(Group::class, 'area_group');
    }

    /** @return BelongsToMany<User, $this> */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'area_user');
    }

    /** @return BelongsToMany<User, $this> */
    public function adminUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'area_user_admin');
    }

    /** @return BelongsToMany<EntryType, $this> */
    public function entryTypes(): BelongsToMany
    {
        return $this->belongsToMany(EntryType::class, 'area_entry_type');
    }
}
