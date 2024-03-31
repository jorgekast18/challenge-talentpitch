<?php

namespace App\Http\Requests;

use App\Http\utils\ResponseHttpRequestUtil;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreChallengeRequest extends FormRequest
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
            //
            'name' => 'required',
            'id' => 'required',

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
