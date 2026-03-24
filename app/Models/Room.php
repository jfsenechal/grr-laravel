<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Room extends Model
{
    public $timestamps = false;

    protected $table = 'grr_room';

    /** @var list<string> */
    protected $fillable = [
        'area_id',
        'room_name',
        'description',
        'capacity',
        'max_booking',
        'statut_room',
        'show_fic_room',
        'picture_room',
        'comment_room',
        'show_comment',
        'delais_max_resa_room',
        'delais_min_resa_room',
        'allow_action_in_past',
        'dont_allow_modify',
        'order_display',
        'delais_option_reservation',
        'type_affichage_reser',
        'moderate',
        'qui_peut_reserver_pour',
        'active_ressource_empruntee',
        'active_cle',
        'active_participant',
        'inscription_participant',
        'nb_participant_defaut',
        'who_can_see',
        'booking_range',
        'who_can_book',
        'confidentiel_resa',
    ];

    /** @return BelongsTo<Area, $this> */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /** @return HasMany<Entry, $this> */
    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class);
    }

    /** @return BelongsToMany<User, $this> */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'grr_j_user_room');
    }

    /** @return BelongsToMany<User, $this> */
    public function bookingUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'grr_j_userbook_room');
    }

    /** @return BelongsToMany<User, $this> */
    public function mailUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'grr_j_mailuser_room');
    }
}
