<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Http\utils\ResponseHttpRequestUtil;

class UpdateProgramRequest extends FormRequest
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
            'name' => ['sometimes', 'required'],
            'id' => ['sometimes', 'required'],
            'usersId' => ['sometimes', 'required'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator The validator instance.
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        // Call the static method of the ResponseHttpRequestUtil class to validate the request.
        ResponseHttpRequestUtil::validateRequest($validator);
    }
}
