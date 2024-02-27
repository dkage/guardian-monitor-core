<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Origin\OriginStoreOrUpdateRequest;
use App\Models\Origin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OriginController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = Origin::all();
        return $this->respondWithSuccess($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OriginStoreOrUpdateRequest $request): JsonResponse
    {
        $validated_data = $request->validated();
        $data = Origin::create($validated_data);

        return $this->respondWithSuccess($data, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Origin $origin): JsonResponse
    {
        return $this->respondWithSuccess($origin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OriginStoreOrUpdateRequest $request, Origin $origin): JsonResponse
    {
        $validated_data = $request->validated();
        $origin->update($validated_data);

        return $this->respondWithSuccess($origin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Origin $origin): JsonResponse
    {
        $origin->delete();

        return $this->respondWithSuccess(null, Response::HTTP_NO_CONTENT);
    }
}
