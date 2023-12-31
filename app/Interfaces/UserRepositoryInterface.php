<?php


namespace App\Interfaces;

use App\Models\User;
use App\Models\UserPreference;


interface UserRepositoryInterface
{
    public function addTask(int $userId,string $title, string $description = null);

    public function changeTask(int $id,string $status);

    public function taskList();


}
