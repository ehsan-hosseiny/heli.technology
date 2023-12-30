<?php


namespace App\Services;

use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{

    /**
     * @inheritDoc
     */
    public function addTask(int $userId,string $title, string $description = null)
    {
        resolve(UserRepositoryInterface::class)->addTask($userId,$title,$description);
    }

    /**
     * @inheritDoc
     */
    public function changeTask(int $id,string $status)
    {
        return resolve(UserRepositoryInterface::class)->changeTask($id, $status);
    }


}
