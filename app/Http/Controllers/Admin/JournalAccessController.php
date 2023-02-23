<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\super_admin\JournalAccessService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JournalAccessController extends Controller
{
    private JournalAccessService $journalAccessService;
    public function __construct(JournalAccessService $journalAccessService)
    {
        $this->journalAccessService = $journalAccessService;
    }

    /**
     * @return JsonResponse get all the journal access users
     */
    public function index() : JsonResponse
    {
        return ApiResponse::success($this->journalAccessService->getAll());
    }

    public function store(Request $request) : JsonResponse
    {
        return ApiResponse::success($this->journalAccessService->create($request->all()));
    }

    public function destroy(int $id) : JsonResponse
    {
        return ApiResponse::success($this->journalAccessService->delete($id));
    }
}
