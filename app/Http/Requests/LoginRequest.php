<?php

namespace App\Http\Requests;

use App\Traits\ResponseContent;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    use ResponseContent;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone_email' => ['required', 'string', 'min:6'],
            'password' => ['required', 'string', Password::min(8)->mixedCase()->letters()->numbers()]
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        $response = $this->formatErrorResponse(
            statusCode: \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED,
            message: trans('messages.validation_error'),
            errors: $validator->errors()->all()
        );
        throw new ValidationException($validator, $response);
    }

}
