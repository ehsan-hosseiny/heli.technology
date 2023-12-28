<?php


namespace App\Services;

use App\Interfaces\AuthServiceInterface;
use App\Models\User;
use App\Interfaces\AuthRepositoryInterface;

class AuthService implements AuthServiceInterface
{

    /**
     * @inheritDoc
     */
    public function register(string $email, string $password):array
    {
       return resolve(AuthRepositoryInterface::class)->register($email,$password);
    }

    public function login(string $email,string $password,string $agent)
    {
        return resolve(AuthRepositoryInterface::class)->login($email,$password,$agent);
    }
}
