<?php


namespace App\Interfaces;

use App\Models\User;

interface AuthRepositoryInterface
{

    /**
     * @param string $email
     * @param string $password
     * @return array
     */
    public function register(string $email,string $password):array;

    /**
     * @param string $email
     * @param string $password
     * @param string $agent
     * @return mixed
     */
    public function login(string $email,string $password,string $agent);


}
