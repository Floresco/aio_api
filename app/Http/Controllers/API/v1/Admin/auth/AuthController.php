<?php

namespace App\Http\Controllers\API\v1\Admin\auth;

use App\Http\Controllers\API\APIController;
use App\Http\Requests\v1\Admin\LoginRequest;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends APIController
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (\Auth::attempt(['email' => $validated['phone_email'], 'password' => $validated['password']])) {
            return $this->formatSuccessResponse(
                statusCode: Response::HTTP_OK,
                message: trans('messages.welcome'),
                data: [
                    'token' => auth()->user()->createToken('aio_api')->plainTextToken
                ]
            );
        } else {
            return $this->formatErrorResponse(
                statusCode: Response::HTTP_UNAUTHORIZED,
                message: trans('auth.failed')
            );
        }
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        auth()->logout();
        $this->formatSuccessResponse(
            statusCode: Response::HTTP_OK,
            message: trans('messages.bye'),
        );
    }
}
