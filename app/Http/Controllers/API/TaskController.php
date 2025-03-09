<?php

namespace App\Http\Controllers\API;

use App\Models\Task;
use App\Http\Requests\TaskDeleteRequest;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return TaskResource::collection(
            auth()->user()->tasks()->filter()->paginate(
                request('per_page', 10)
            )->withQueryString()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $request): TaskResource
    {
        return TaskResource::make($request->persist());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task): TaskResource
    {
        return TaskResource::make($request->persist($task));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskDeleteRequest $request, Task $task): JsonResponse
    {
        $request->persist($task);

        return response()->json('Task Deleted Successfully');
    }
}
