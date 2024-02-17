<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Project\ProjectStoreOrUpdateRequest;
use App\Models\Project;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->respondWithSuccess(Project::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreOrUpdateRequest $request)
    {
        $data = $request->validated();
        $project = Project::create($data);

        return $this->respondWithSuccess($project, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return $this->respondWithSuccess($project);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectStoreOrUpdateRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->update($data);

        return $this->respondWithSuccess($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return $this->respondWithSuccess(null, Response::HTTP_NO_CONTENT);
    }
}
