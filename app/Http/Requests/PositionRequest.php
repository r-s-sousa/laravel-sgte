<?php

namespace App\Http\Requests;

use App\Models\Position;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    protected Position $position;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'shortName' => [
                'required',
                'min:3',
                'max:10',
                Rule::unique('positions', 'shortName')
                    ->ignore($this->position)
            ],
            'name' => [
                'required',
                'min:3',
                'max:50',
                Rule::unique('positions', 'name')
                    ->ignore($this->position)
            ],
            'priority' => ['required', 'integer']
        ];
    }
}
