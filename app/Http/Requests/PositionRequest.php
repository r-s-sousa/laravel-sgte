<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    public function rules(): array
    {
        $positionId = $this->route('position')->id;

        return [
            'shortName' => [
                'required',
                'min:3',
                'max:10',
                'string',
                Rule::unique('positions', 'shortName')->ignore($positionId)
            ],
            'name' => [
                'required',
                'min:3',
                'max:50',
                'string',
                Rule::unique('positions', 'name')->ignore($positionId)
            ],
            'priority' => [
                'required',
                'integer',
                'min:1',
                'max:999',
                Rule::unique('positions', 'priority')->ignore($positionId)
            ]
        ];
    }
}
