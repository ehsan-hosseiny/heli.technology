<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

use App\Http\Requests\AddPreferenceRequest;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\SourceCollection;
use App\Http\Resources\UserPreferenceCollection;
use App\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private UserServiceInterface $userServiceInterface)
    {
    }

    public function createTask(CreateTaskRequest $request)
    {
        $this->userServiceInterface->addTask(auth()->user()->id,$request->title,$request->description);
        return response()->json(['message' => __('common.success_created'), 'data' => ''],Response::HTTP_OK);
    }

    public function editTask($id,UpdateTaskRequest $request)
    {
        $this->userServiceInterface->editTask($id,$request->status);
        return response()->json(['message' => __('common.success_updated'), 'data' => ''], Response::HTTP_OK);
    }
}
