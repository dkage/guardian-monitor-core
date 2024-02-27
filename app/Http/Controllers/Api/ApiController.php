<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ApiController extends Controller
{
    /**
     * Default success response for API calls
     *
     * @param $data
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function respondWithSuccess($data, int $statusCode = HttpResponse::HTTP_OK): JsonResponse
    {
        return response()->json(['success' => true, 'data' => $data], $statusCode);
    }

    /**
     * Default error response for API calls
     *
     * @param $message
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function respondWithError($message, int $statusCode = HttpResponse::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json(['success' => false, 'error' => $message], $statusCode);
    }

}
