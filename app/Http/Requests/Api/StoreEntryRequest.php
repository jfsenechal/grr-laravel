<?php

declare(strict_types=1);

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

final class StoreEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'room_id' => ['required', 'integer', 'exists:grr_room,id'],
            'name' => ['required', 'string', 'max:255'],
            'start_time' => ['required', 'integer', 'min:0'],
            'end_time' => ['required', 'integer', 'gt:start_time'],
            'entry_type' => ['sometimes', 'integer', 'exists:grr_type_area,id'],
            'type' => ['sometimes', 'string', 'max:1'],
            'statut_entry' => ['sometimes', 'string', 'max:1'],
            'description' => ['sometimes', 'nullable', 'string'],
            'beneficiaire' => ['sometimes', 'nullable', 'string', 'max:255'],
            'beneficiaire_ext' => ['sometimes', 'nullable', 'string', 'max:255'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'end_time.gt' => 'The end time must be after the start time.',
            'room_id.exists' => 'The selected room does not exist.',
        ];
    }
}
