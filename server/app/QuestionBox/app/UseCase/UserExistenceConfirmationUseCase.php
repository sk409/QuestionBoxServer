<?php

namespace App\UseCase;

use App\Domain\User;
use App\Domain\UserUserId;

interface UserExistenceConfirmationUseCase
{
    public function execute(UserUserId $userId): UserExistenceConfirmationUseCaseOutputData;
}

class UserExistenceConfirmationUseCaseOutputData
{

    private $existence;
    private $user;

    public function __construct(bool $existence, ?User $user)
    {
        $this->existence = $existence;
        $this->user = $user;
    }

    public function getExistence(): bool
    {
        return $this->existence;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
}
