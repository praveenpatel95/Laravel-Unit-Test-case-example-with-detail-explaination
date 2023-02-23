<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\super_admin\JournalService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class JournalController extends Controller
{
    protected JournalService $journalService;
    public function __construct(JournalService $journalService)
    {
        $this->journalService = $journalService;
    }

    /**
     * @return JsonResponse get all the journals data
     *
     */
    public function index() : JsonResponse
    {
       return ApiResponse::success($this->journalService->get());
    }

    /**
     * @param Request $request
     * @return JsonResponse
    */

    public function store(Request $request) : JsonResponse
    {
        return ApiResponse::success($this->journalService->create($request->all()));
    }

    public function update(Request $request, int $id) : JsonResponse
    {
        return ApiResponse::success($this->journalService->update($request->all(), $id));
    }

    public function show(int $id): JsonResponse
    {
        return ApiResponse::success($this->journalService->getById($id));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(Request $request, int $id) : JsonResponse
    {
        return ApiResponse::success($this->journalService->deleteById($id));
    }
}
