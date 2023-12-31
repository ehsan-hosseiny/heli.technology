<?php

namespace App\Repositories;

use App\Events\TaskStatusChanged;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Task;

class UserRepository implements UserRepositoryInterface
{

    public function addTask(int $userId,string $title, string $description = null)
    {
        Task::create([
            'user_id'=>$userId,
            'title'=>$title,
            'description'=>$description,
        ]);
    }

    public function changeTask(int $id,string $status)
    {
        $task = Task::find($id);
        $task->update(['status' => $status]);

        // After changing the task status
        event(new TaskStatusChanged($task->id, $status));
    }

    public function taskList()
    {
        return auth()->user()->tasks;

    }
}
