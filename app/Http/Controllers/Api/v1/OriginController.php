<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
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
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $data = Origin::create($validated);

        return $this->respondWithSuccess($data, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $data = Origin::findOrFail($id);
        return $this->respondWithSuccess($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $data = Origin::findOrFail($id);
        $data->update($validated);

        return $this->respondWithSuccess($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $data = Origin::findOrFail($id);
        $data->delete();

        return $this->respondWithSuccess(null, Response::HTTP_NO_CONTENT);
    }
}
