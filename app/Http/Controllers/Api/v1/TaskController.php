<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Tasks\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends ApiController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Task::all();
        return $this->respondWithSuccess($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $data = $request->validated();
        $task = Task::create($data);

        return $this->respondWithSuccess($task, Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $this->respondWithSuccess($task);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return $this->respondWithSuccess(null, Response::HTTP_NO_CONTENT);
    }
}
