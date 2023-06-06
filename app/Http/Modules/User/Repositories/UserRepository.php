<?php

namespace App\Http\Modules\User\Repositories;

use App\Models\User;

class UserRepository
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Find user by email.
     *
     * @param string $email
     * @return object
     */
    public function getUserByEmail(string $email): object
    {
        return $this->userModel->where('email', $email)->first();
    }
}
