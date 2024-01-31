<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ApiController extends Controller
{
    protected function respondWithSuccess($data, $statusCode = HttpResponse::HTTP_OK): JsonResponse
    {
        return response()->json(['success' => true, 'data' => $data], $statusCode);
    }

    protected function respondWithError($message, $statusCode = HttpResponse::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json(['success' => false, 'error' => $message], $statusCode);
    }

    // Other common helper methods...
}
