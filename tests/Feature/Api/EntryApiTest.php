<?php

declare(strict_types=1);

use App\Models\Area;
use App\Models\Entry;
use App\Models\Room;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('returns 401 without a token', function () {
    auth()->forgetGuards();

    $this->getJson('/api/entries')
        ->assertUnauthorized();
});

it('returns entries with a valid token', function () {
    $area = Area::query()->create(['area_name' => 'Test Area']);
    $room = Room::query()->create(['area_id' => $area->id, 'room_name' => 'Room 1', 'comment_room' => '']);
    Entry::query()->create([
        'room_id' => $room->id,
        'start_time' => strtotime('2026-03-23 08:00'),
        'end_time' => strtotime('2026-03-23 09:00'),
        'name' => 'Test Entry',
    ]);

    Sanctum::actingAs(User::factory()->create());

    $this->getJson('/api/entries')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.name', 'Test Entry');
});

it('filters entries by area', function () {
    $area1 = Area::query()->create(['area_name' => 'Area 1']);
    $area2 = Area::query()->create(['area_name' => 'Area 2']);
    $room1 = Room::query()->create(['area_id' => $area1->id, 'room_name' => 'Room A', 'comment_room' => '']);
    $room2 = Room::query()->create(['area_id' => $area2->id, 'room_name' => 'Room B', 'comment_room' => '']);

    Entry::query()->create(['room_id' => $room1->id, 'start_time' => 1000, 'end_time' => 2000, 'name' => 'In Area 1']);
    Entry::query()->create(['room_id' => $room2->id, 'start_time' => 1000, 'end_time' => 2000, 'name' => 'In Area 2']);

    Sanctum::actingAs(User::factory()->create());

    $this->getJson('/api/entries?area_id='.$area1->id)
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.name', 'In Area 1');
});

it('filters entries by room', function () {
    $area = Area::query()->create(['area_name' => 'Area']);
    $room1 = Room::query()->create(['area_id' => $area->id, 'room_name' => 'Room 1', 'comment_room' => '']);
    $room2 = Room::query()->create(['area_id' => $area->id, 'room_name' => 'Room 2', 'comment_room' => '']);

    Entry::query()->create(['room_id' => $room1->id, 'start_time' => 1000, 'end_time' => 2000, 'name' => 'Room 1 Entry']);
    Entry::query()->create(['room_id' => $room2->id, 'start_time' => 1000, 'end_time' => 2000, 'name' => 'Room 2 Entry']);

    Sanctum::actingAs(User::factory()->create());

    $this->getJson('/api/entries?room_id='.$room1->id)
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.name', 'Room 1 Entry');
});

it('filters entries by date range', function () {
    $area = Area::query()->create(['area_name' => 'Area']);
    $room = Room::query()->create(['area_id' => $area->id, 'room_name' => 'Room', 'comment_room' => '']);

    Entry::query()->create([
        'room_id' => $room->id,
        'start_time' => strtotime('2026-03-20 10:00'),
        'end_time' => strtotime('2026-03-20 11:00'),
        'name' => 'Before range',
    ]);
    Entry::query()->create([
        'room_id' => $room->id,
        'start_time' => strtotime('2026-03-25 10:00'),
        'end_time' => strtotime('2026-03-25 11:00'),
        'name' => 'In range',
    ]);
    Entry::query()->create([
        'room_id' => $room->id,
        'start_time' => strtotime('2026-03-30 10:00'),
        'end_time' => strtotime('2026-03-30 11:00'),
        'name' => 'After range',
    ]);

    Sanctum::actingAs(User::factory()->create());

    $this->getJson('/api/entries?start_date=2026-03-24&end_date=2026-03-26')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.name', 'In range');
});
