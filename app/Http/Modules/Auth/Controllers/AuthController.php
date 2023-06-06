<?php

namespace App\Http\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Auth\Services\AuthService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Function to login user.
     *
     *@param Request $request
     *@return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $userLogin = $this->authService->login($request);
            return response()->json(
                [
                    'data' => [
                        'user' =>  $userLogin->user,
                        'token' => $userLogin->token,
                    ],
                ],
                HttpResponse::HTTP_OK
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Error de login conulta al administrador',
                ],
                HttpResponse::HTTP_BAD_REQUEST
            );
        }
    }
}
