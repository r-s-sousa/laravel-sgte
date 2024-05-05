<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'shortName' => [
                'required',
                'min:3',
                'max:10',
                'string',
            ],
            'name' => [
                'required',
                'min:3',
                'max:50',
                'string',
            ],
            'priority' => [
                'required',
                'integer',
                'min:1',
                'max:999',
            ]
        ];

        $positionId = $this->route('position')->id ?? null;

        if ($positionId !== null) {
            $rules['shortName'][] = Rule::unique('positions', 'shortName')->ignore($positionId);
            $rules['name'][] = Rule::unique('positions', 'name')->ignore($positionId);
            $rules['priority'][] = Rule::unique('positions', 'priority')->ignore($positionId);
        }

        return $rules;
    }
}
