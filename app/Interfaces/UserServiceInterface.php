<?php


namespace App\Interfaces;

use App\Models\User;
use App\Models\UserPreference;


interface UserServiceInterface
{

    /**
     * @param int $userId
     * @param string $title
     * @param string|null $description
     * @return mixed
     */
    public function addTask(int $userId,string $title, string $description = null);

    /**
     * @param int $id
     * @param string $status
     * @return mixed
     */
    public function changeTask(int $id,string $status);

    /**
     * @return mixed
     */
    public function taskList();



}
