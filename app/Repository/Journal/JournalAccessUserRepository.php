<?php

namespace App\Repository\Journal;

use App\Models\JournalAccessUser;
use App\Repository\BaseRepository;
use App\Repository\Journal\Contracts\IJournalAccessUserRepository;
use Illuminate\Database\Eloquent\Collection;

class JournalAccessUserRepository extends BaseRepository implements IJournalAccessUserRepository
{
    public function model()
    {
        return JournalAccessUser::class;
    }

    public function getAllJournals() : Collection
    {
        return $this->model->with(['user', 'journal'])->get();
    }
}
