<?php

namespace App\Repository\Journal;

use App\Models\Journal;
use App\Repository\BaseRepository;
use App\Repository\Journal\Contracts\IJournalRepository;

class JournalRepository extends BaseRepository implements IJournalRepository
{
    public function model(){
        return Journal::class;
    }

}
