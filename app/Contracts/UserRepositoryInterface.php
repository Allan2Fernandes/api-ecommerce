<?php

namespace App\Contracts;

use App\Data\RegisterUserData;

interface UserRepositoryInterface {
    public function createUser(RegisterUserData $data);
}