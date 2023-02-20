<?php

namespace App\Http\Requests;

use App\Traits\ResponseContent;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
{
    use ResponseContent;


    public function rules(): array
    {
        return [
//            'user_profil_id' => ['required', 'uuid', Rule::exists('user_profils', 'id')],
            'firstname' => ['required', 'string', 'alpha', 'min:2'],
            'lastname' => ['required', 'string', 'alpha', 'min:2'],
            'phone' => ['required', 'numeric', 'digits:8'],
            'email' => ['required', 'email:rfc,dns'],
            'key' => ['prohibits:password', 'nullable', 'uuid', 'exists:users,id'],
            'password' => ['prohibits:key', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        $response = $this->formatErrorResponse(
            statusCode: \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED,
            message: trans('messages.validation_error'),
            errors: $validator->errors()->all()
        );
        throw new ValidationException($validator, $response);
    }
}
