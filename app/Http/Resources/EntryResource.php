<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class EntryResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'entry_type' => $this->entry_type,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'statut_entry' => $this->statut_entry,
            'beneficiaire' => $this->beneficiaire,
            'beneficiaire_ext' => $this->beneficiaire_ext,
            'create_by' => $this->create_by,
            'moderate' => $this->moderate,
            'room' => [
                'id' => $this->room->id,
                'name' => $this->room->room_name,
                'area_id' => $this->room->area_id,
            ],
        ];
    }
}
