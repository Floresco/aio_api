<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseContent
{
    /**
     * @param int $statusCode
     * @param string $message
     * @param array $data
     * @return JsonResponse
     */
    public function formatSuccessResponse(int $statusCode = 200, string $message = '', array $data = []): JsonResponse
    {
        return response()->json([
            'status' => true,
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * @param int $statusCode
     * @param string $message
     * @param array $errors
     * @return JsonResponse
     */
    public function formatErrorResponse(int $statusCode = 200, string $message = '', array $errors = []): JsonResponse
    {
        return response()->json([
            'status' => false,
            'statusCode' => $statusCode,
            'message' => $message,
            'errors' => $errors
        ], $statusCode);
    }
}
