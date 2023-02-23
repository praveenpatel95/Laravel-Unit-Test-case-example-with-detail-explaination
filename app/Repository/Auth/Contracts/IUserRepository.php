<?php

namespace App\Repository\Auth\Contracts;

use App\Models\User;
use App\Repository\RepositoryContract;

interface IUserRepository extends RepositoryContract
{
    function getByEmail(string $emailId): ?User;
}
