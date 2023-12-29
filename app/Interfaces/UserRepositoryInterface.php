<?php


namespace App\Interfaces;

use App\Models\User;
use App\Models\UserPreference;


interface UserRepositoryInterface
{
    public function addTask(int $userId,string $title, string $description = null);

    public function editTask(int $id,string $status);

}
