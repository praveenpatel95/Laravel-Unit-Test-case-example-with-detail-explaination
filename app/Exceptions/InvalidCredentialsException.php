<?php

namespace App\Exceptions;

use App\Helpers\ApiResponse;
use App\Helpers\JsonResponse;
use Exception;
use Illuminate\Http\Request;

class InvalidCredentialsException extends Exception
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(Request $request)
    {
        return ApiResponse::fail(__('auth.failed'), 401);
    }
}
