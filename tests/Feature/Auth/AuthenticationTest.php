<?php

namespace Tests\Feature\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BookingTest
 */
class AuthenticationTest extends TestCase
{

    /**
     * User is not validate can not register
     */
    public function test_register_should_be_validate()
    {
        $response = $this->postJson(route('auth.register'));
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * New User can register
     */
    public function test_new_user_can_register()
    {
        $response = $this->postJson(route('auth.register'), [
            "email" => fake()->unique()->safeEmail(),
            "password" => fake()->password
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * Test Login
     */
    public function test_login_should_be_validated()
    {
        $response = $this->postJson(route('auth.login'));
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Test login
     */
    public function test_user_can_login_with_true_credentials()
    {
        $password =  Hash::make('123456');
        $user = User::factory()->create([
            'email' => fake()->email,
            'password' => $password,
        ]);
        $response = $this->postJson(route('auth.login'), [
            'email' => $user->email,
            'password' => '123456',
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }

}

