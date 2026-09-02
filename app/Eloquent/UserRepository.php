<?php

namespace App\Eloquent;

use App\Contracts\UserRepositoryInterface;
use App\Data\RegisterUserData;
use App\Models\User;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface {
    public function createUser(RegisterUserData $data) {
        User::create(array_merge($data->toArray(), ['id' => (string)Str::uuid()]));
    }
}