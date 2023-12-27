<?php


namespace App\Interfaces;

use App\Models\User;
use App\Models\UserPreference;


interface UserServiceInterface
{
    /**
     * @return UserPreference
     */
    public function preferences();

    /**
     * @return mixed
     */
    public function sources();

    /**
     * @param string $type
     * @param string $preference
     * @return mixed
     */
    public function addPreferences(string $type,string $preference);

    /**
     * @return UserPreference
     */
    public function deletePreferences($id);

    /**
     * @param int $perPage
     * @return mixed
     */
    public function news(int $perPage);

}
