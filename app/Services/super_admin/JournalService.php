<?php

namespace App\Services\super_admin;

use App\Helpers\ValidationHelper;
use App\Repository\Journal\Contracts\IJournalRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class JournalService
{
    protected IJournalRepository $IJournalRepository;
    public function __construct(IJournalRepository $IJournalRepository)
    {
        $this->IJournalRepository = $IJournalRepository;
    }

    public function get() : Collection
    {
        return $this->IJournalRepository->get();
    }

    public function create(array $data) : void
    {
        $this->validateData($data);
        $data['slug'] = Str::slug($data['name']);
        $data['banner'] = $this->imageStore($data);
        $this->IJournalRepository->create($data);
    }

    public function update(array $data, int $id): void
    {
        $this->validateData($data);
        $data['slug'] = Str::slug($data['name']);
        if(!empty($data['banner'])){
            $data['banner'] = $this->imageStore($data);
        }
        $this->IJournalRepository->updateById($id, $data);
    }

    public function getById(int $id)
    {
        return $this->IJournalRepository->getById($id);
    }

    public function deleteById(int $id)
    {
        $this->IJournalRepository->deleteById($id);
    }

    public function validateData($data){
        $validationRules = [
          'name' => 'required',
          'banner_content' => 'required',
        ];
        ValidationHelper::validate($data, $validationRules);
    }

    public function imageStore($data){
        if (isset($data['banner'])) {
            if (file_exists($data['banner'])) {
                $file = $data['banner'];
                $journalName = str_replace(' ', '_', strtolower($data['name']));
                $filename = $journalName .'.'. $file->getClientOriginalExtension();
                $path = $file->storeAs('journals/banner', $filename);
                return $path;
            }
        }
        return null;
    }
}
