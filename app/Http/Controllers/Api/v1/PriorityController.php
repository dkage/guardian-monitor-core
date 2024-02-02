<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Models\Priority;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PriorityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse - contains a collection with all priorities
     */
    public function index(): JsonResponse
    {
        $data = Priority::all();
        return $this->respondWithSuccess($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse - contains the newly created resource
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255'
        ]);

        $data = Priority::create($validated);

        return $this->respondWithSuccess($data, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param string $priorityId
     * @return JsonResponse - contains the specified resource
     */
    public function show(string $priorityId): JsonResponse
    {
        $data = Priority::findOrFail($priorityId);
        return $this->respondWithSuccess($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse - contains the updated resource value
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255'
        ]);

        $data = Priority::findOrFail($id);
        $data->update($validated);

        return $this->respondWithSuccess($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $priorityId
     * @return JsonResponse - with no content as delete is successful
     */
    public function destroy(string $priorityId): JsonResponse
    {
        $data = Priority::findOrFail($priorityId);
        $data->delete();

        return $this->respondWithSuccess(null, Response::HTTP_NO_CONTENT);
    }
}
