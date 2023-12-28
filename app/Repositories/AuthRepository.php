<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{



    /**
     * @inheritDoc
     */
    public function register(string $email, string $password):array
    {
        $user = User::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $token = $user->createToken('AuthToken')->plainTextToken;
        return ['user'=>$user,'token'=> $token];
    }

    public function login(string $email,string $password,string $agent)
    {
        if (auth()->attempt(['email'=>$email,'password'=>$password])) {
            $user = auth()->user();
            $token = $user->createToken($agent)->plainTextToken;
            return ['user'=>$user,'token'=>$token];
        } else {
            return false;
        }
    }
}
