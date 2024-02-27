<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Priority\PriorityStoreOrUpdateRequest;
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
    public function store(PriorityStoreOrUpdateRequest $request): JsonResponse
    {
        $validated_data = $request->validated();
        $priority = Priority::create($validated_data);

        return $this->respondWithSuccess($priority, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Priority $priority
     * @return JsonResponse - contains the specified resource
     */
    public function show(Priority $priority): JsonResponse
    {
        return $this->respondWithSuccess($priority);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse - contains the updated resource value
     */
    public function update(PriorityStoreOrUpdateRequest $request, Priority $priority): JsonResponse
    {
        $validated_data = $request->validated();
        $priority->update($validated_data);

        return $this->respondWithSuccess($priority);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Priority $priority
     * @return JsonResponse - with no content as delete is successful
     */
    public function destroy(Priority $priority): JsonResponse
    {
        $priority->delete();

        return $this->respondWithSuccess(null, Response::HTTP_NO_CONTENT);
    }
}
