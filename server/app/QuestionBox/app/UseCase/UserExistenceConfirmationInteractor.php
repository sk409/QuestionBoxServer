<?php

namespace App\UseCase;

use App\Domain\UserUserId;
use App\Gateway\Repository\UserRepository;

class UserExistenceConfirmationInteractor implements UserExistenceConfirmationUseCase
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UserUserId $userId): UserExistenceConfirmationUseCaseOutputData
    {
        $user = $this->userRepository->findFirstByUserId($userId);
        return new UserExistenceConfirmationUseCaseOutputData(!is_null($user), $user);
    }
}
