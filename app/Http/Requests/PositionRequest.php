<?php

namespace App\Http\Requests;

use App\Models\Position;
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
                'unique' => Rule::unique(Position::class)
            ],
            'name' => [
                'required',
                'min:3',
                'max:50',
                'string',
                'unique' => Rule::unique(Position::class)
            ],
            'priority' => [
                'required',
                'integer',
                'min:1',
                'max:999',
                'unique' => Rule::unique(Position::class)
            ]
        ];

        if ($this->isMethod('patch')) {
            $rules['shortName']['unique'] = Rule::unique(Position::class)->ignore($this->route('position'));
            $rules['name']['unique'] = Rule::unique(Position::class)->ignore($this->route('position'));
            $rules['priority']['unique'] = Rule::unique(Position::class)->ignore($this->route('position'));
        }

        return $rules;
    }
}
