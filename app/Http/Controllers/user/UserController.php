<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Interfaces\UserServiceInterface;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private UserServiceInterface $userServiceInterface)
    {
    }

    public function taskList()
    {
        $this->userServiceInterface->taskList();
//        return response()->json(['message' => __('common.success_updated'), 'data' => ''], Response::HTTP_OK);
    }

    public function createTask(CreateTaskRequest $request)
    {
        $this->userServiceInterface->addTask(auth()->user()->id,$request->title,$request->description);
        return response()->json(['message' => __('common.success_created'), 'data' => ''],Response::HTTP_OK);
    }

    public function changeTask($id,UpdateTaskRequest $request)
    {
        $this->userServiceInterface->changeTask($id,$request->status);
        return response()->json(['message' => __('common.success_updated'), 'data' => ''], Response::HTTP_OK);
    }
}
