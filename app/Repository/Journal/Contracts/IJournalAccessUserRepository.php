<?php

namespace App\Repository\Journal\Contracts;

use App\Repository\RepositoryContract;
use Illuminate\Database\Eloquent\Collection;

interface IJournalAccessUserRepository extends RepositoryContract
{
    public function getAllJournals() : Collection;
}
