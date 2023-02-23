<?php

namespace App\Services\super_admin;

use App\Exceptions\BadRequestException;
use App\Helpers\ValidationHelper;
use App\Repository\Journal\Contracts\IJournalAccessUserRepository;
use App\Services\Auth\AuthService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class JournalAccessService
{
    protected IJournalAccessUserRepository $journalAccessUserRepository;
    protected AuthService $authService;
    public function __construct(
        IJournalAccessUserRepository $journalAccessUserRepository,
        AuthService $authService
    )
    {
        $this->journalAccessUserRepository = $journalAccessUserRepository;
        $this->authService = $authService;
    }

    public function getAll() : Collection
    {
        return $this->journalAccessUserRepository->getAllJournals();
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $user = $this->authService->register($data, 'admin');

            $accessData = [
                'journal_id' => $data['journal_id'],
                'user_id' => $user->id,
            ];
            $this->validateData($accessData);
            $this->journalAccessUserRepository->create($accessData);
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }


    }

    public function validateData($data){
        $validationRules = [
            'journal_id' =>'required|integer|exists:journals,id',
            'user_id' =>'required|integer|exists:users,id',
        ];
        ValidationHelper::validate($data, $validationRules);

    }

    public function delete(int $id): bool
    {
        return $this->journalAccessUserRepository->deleteById($id);
    }
}
