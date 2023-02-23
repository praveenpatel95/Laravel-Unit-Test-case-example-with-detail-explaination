<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\User;
use App\Services\Auth\AuthService;
use App\Services\TestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function add(TestService $testService): int
    {
        return $testService->add(2, 4);
    }

    public function getUser(User $user)
    {
       // $user = User::find($id);
        return $user;
      //  return response()->json(['user' => $user]);
    }

    public function createUser(AuthService $authService){
        $data = [
            'name' => 'prem',
            'email' => 'patel@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
            'role_type' =>'admin'
        ];
        $authService->register($data, 'admin');
    }
}
