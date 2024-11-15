<?php

namespace App\Http\Requests\City;

use Illuminate\Contracts\Validation\Validator as Validation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'state_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:255']
        ];
    }
    public function failedValidation(Validation $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => false,
            'message'   => 'Validation errors',
            'errors'      => $validator->errors()
        ], 422));
    }
}
