<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * @method all()
 */
class BaseRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @param \Illuminate\Contracts\Validation\Validator $validator
     *
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    // Nghia
//    protected function failedValidation(Validator $validator): void
//    {
//        throw new ValidationException(
//            $validator,
//            Response::data($validator->messages(), 0, 'Error validate', 422)
//        );
//    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                $validator->errors(),
                422
            )
        );
    }
}
