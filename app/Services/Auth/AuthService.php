<?php

namespace App\Services\Auth;

use App\Exceptions\InvalidCredentialsException;
use App\Helpers\ValidationHelper;
use App\Repository\Auth\Contracts\IUserRepository;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    private IUserRepository $userRepository;
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function login($data){
        $validationRules = [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
        ValidationHelper::validate($data, $validationRules);
        $user = $this->userRepository->getByEmail($data['email']);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new InvalidCredentialsException();
        }
        //$user->getRoleNames();
        return $user->withToken();
        //return $this->userRepository->login();
    }

    public function register(array $data, string $role=''){
        $validationRules = [
            'name' =>'required|max:255',
            'email' =>'required|max:255|unique:users',
            'password' =>'required|confirmed',
        ];
        ValidationHelper::validate($data, $validationRules);
        $data['password'] = Hash::make($data['password']);
        $data['role_type'] = $role;
        $user =  $this->userRepository->create($data);
        $user->assignRole('admin');
        return $user;
    }
}
