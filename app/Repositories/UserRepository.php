<?php

namespace App\Repositories;

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
}
