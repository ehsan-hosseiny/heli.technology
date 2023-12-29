<?php


namespace App\Services;

use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServiceInterface;
use App\Models\UserPreference;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface
{

    /**
     * @inheritDoc
     */
    public function addTask(int $userId,string $title, string $description = null)
    {
        return resolve(UserRepositoryInterface::class)->addTask($userId,$title,$description);
    }

    /**
     * @inheritDoc
     */
    public function editTask()
    {
        return resolve(UserRepositoryInterface::class)->preferences();
    }


}
