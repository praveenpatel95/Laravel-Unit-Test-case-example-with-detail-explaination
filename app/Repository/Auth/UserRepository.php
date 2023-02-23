<?php

namespace App\Repository\Auth;

use App\Models\User;
use App\Repository\Auth\Contracts\IUserRepository;
use App\Repository\BaseRepository;

class UserRepository extends BaseRepository implements IUserRepository
{
    function model(){
        return User::class;
    }
    function getByEmail(string $emailId): ?User
    {
       return $this->model->where('email', $emailId)->first();
    }
}
