<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EntryResource;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class EntryController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $validated = $request->validate([
            'area_id' => ['sometimes', 'integer'],
            'room_id' => ['sometimes', 'integer'],
            'start_date' => ['sometimes', 'date'],
            'end_date' => ['sometimes', 'date'],
        ]);

        $entries = Entry::query()
            ->with('room')
            ->when(isset($validated['area_id']), fn ($query) => $query->whereHas(
                'room',
                fn ($q) => $q->where('area_id', $validated['area_id'])
            ))
            ->when(isset($validated['room_id']), fn ($query) => $query->where('room_id', $validated['room_id']))
            ->when(isset($validated['start_date']), fn ($query) => $query->where(
                'start_time',
                '>=',
                strtotime($validated['start_date'])
            ))
            ->when(isset($validated['end_date']), fn ($query) => $query->where(
                'end_time',
                '<=',
                strtotime($validated['end_date']) + 86399
            ))
            ->orderBy('start_time')
            ->paginate();

        return EntryResource::collection($entries);
    }
}
