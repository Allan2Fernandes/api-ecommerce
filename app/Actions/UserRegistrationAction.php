<?php

namespace App\Actions;

use App\Contracts\UserRepositoryInterface;
use App\Data\RegisterUserData;
use Lorisleiva\Actions\Concerns\AsAction;

class UserRegistrationAction
{
    use AsAction;

    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }
    

    public function handle(RegisterUserData $data): void
    {
        $this->userRepositoryInterface->createUser($data);
    }
}
