<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

use App\Http\Requests\AddPreferenceRequest;
use App\Http\Requests\CreateTaskRequest;
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

        $data = $this->userServiceInterface->addTask(auth()->user()->id,$request->title,$request->description);

        return response()->json(['message' => 'user preferences', 'data' => '', Response::HTTP_OK]);
    }

    public function editTask(Request $request)
    {

        $data = $this->userServiceInterface->editTask($request);
        return response()->json([
            'message' => 'user preferences',
            'data' => SourceCollection::collection($data)->response()->getData(true)],
            Response::HTTP_OK);
    }
}
