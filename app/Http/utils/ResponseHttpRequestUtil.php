<?php
namespace App\Http\utils;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ResponseHttpRequestUtil {
    /*
     * this will handle the errors and sends back 400 bad request if validation fails
     * you can place this method in a helper file or create a trait
     * to easy access in all the form requests
     */
    public static function validateRequest(Validator $validator): ?array
    {
        $errors = [];
        $fails  = (new ValidationException($validator))->errors();
        foreach ($fails as $key => $error) {
            $errors[$key] = $error[0];
        }

        if (count($errors) > 0) {
            // sends back an error message
            throw new HttpResponseException(
                response([
                    'status' => false,
                    'message' => 'validation failed',
                    'errors' => $errors
                ], Response::HTTP_BAD_REQUEST)
            );
        }
    }
}

