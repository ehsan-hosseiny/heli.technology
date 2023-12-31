<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Interfaces\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private UserServiceInterface $userServiceInterface)
    {
    }

    /**
     * Return users task list
     * @return JsonResponse
     */
    public function taskList():JsonResponse
    {
        $data = TaskResource::collection($this->userServiceInterface->taskList());
        return response()->json([
            'message' => __('common.success_updated'),
            'data' => $data], Response::HTTP_OK);
    }

    /**
     * Create new task
     * @param CreateTaskRequest $request
     * @return JsonResponse
     */
    public function createTask(CreateTaskRequest $request):JsonResponse
    {
        $this->userServiceInterface->addTask(auth()->user()->id,$request->title,$request->description);
        return response()->json(['message' => __('common.success_created'), 'data' => ''],Response::HTTP_OK);
    }

    /**
     * Change users task status
     * @param $id
     * @param UpdateTaskRequest $request
     * @return JsonResponse
     */
    public function changeTask($id,UpdateTaskRequest $request):JsonResponse
    {
        $this->userServiceInterface->changeTask($id,$request->status);
        return response()->json(['message' => __('common.success_updated'), 'data' => ''], Response::HTTP_OK);
    }
}
