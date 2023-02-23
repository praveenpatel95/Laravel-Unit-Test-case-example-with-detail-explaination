<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_without_required()
    {
        $data = [
            'email' => '',
            'password' => ''
        ];
        $this->post('/api/auth/login', $data)
            ->assertUnProcessable()
            //->assertStatus(422) //instead of use unprocessable

            ->assertJson([
                'error' => true,
                'message' => [
                    "email" => [
                        "The email field is required."
                    ],
                    "password" => [
                        "The password field is required."
                    ]]
            ]);
    }

    public function test_login_attept_success()
    {
       $user = User::factory()->create();
        $data = [
            'email' => $user->email,
            'password' => 'password'
        ];
        $this->post('/api/auth/login', $data)
            ->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'email_verified_at',
                'role_type',
                'created_at',
                'updated_at',
                'token'
            ]

        ]);
    }


}
