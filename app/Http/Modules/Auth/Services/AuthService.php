<?php

namespace App\Http\Modules\Auth\Services;

use App\Http\Modules\User\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Function to login user.
     *
     */
    public function login($request)
    {
        $user = $this->userRepository->getUserByEmail($request->email);

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('SISMA')->plainTextToken;

            return (object)[
                'user' => $user,
                'token' => $token,
                'login' => 'success'
            ];
        } else {
            return (object)[
                'login' => 'failed'
            ];
        }
    }
}
