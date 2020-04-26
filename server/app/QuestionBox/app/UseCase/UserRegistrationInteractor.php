<?php

namespace App\UseCase;

use App\Domain\UserName;
use App\Domain\UserPassword;
use App\Domain\UserUserId;
use App\Exceptions\UserAlreadyExistsException;
use App\Gateway\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserRegistrationInteractor implements UserRegistrationUseCase
{

    private $accessTokenIssueUseCase;
    private $refreshTokenIssueUseCase;
    private $userExistenceConfirmationUseCase;

    private $userRepository;

    public function __construct(AccessTokenIssueUseCase $accessTokenIssueUseCase, RefreshTokenIssueUseCase $refreshTokenIssueUseCase, UserExistenceConfirmationUseCase $userExistenceConfirmationUseCase, UserRepository $userRepository)
    {
        $this->accessTokenIssueUseCase = $accessTokenIssueUseCase;
        $this->refreshTokenIssueUseCase = $refreshTokenIssueUseCase;
        $this->userExistenceConfirmationUseCase = $userExistenceConfirmationUseCase;
        $this->userRepository = $userRepository;
    }

    public function execute(UserName $name, UserUserId $userId, string $rawPassword): UserRegistrationUseCaseOutputData
    {
        $userExistenceConfirmationUseCaseOutputData = $this->userExistenceConfirmationUseCase->execute($userId);
        if ($userExistenceConfirmationUseCaseOutputData->getExistence()) {
            throw new UserAlreadyExistsException();
        }
        $password = UserPassword::create(Hash::make($rawPassword));
        $user = $this->userRepository->save($name, $password, $userId);
        $this->refreshTokenIssueUseCase->execute($user->getUserId(), $rawPassword);
        $accessTokenIssueUseCaseOutputData = $this->accessTokenIssueUseCase->execute($userId, $rawPassword);
        return new UserRegistrationUseCaseOutputData(
            $accessTokenIssueUseCaseOutputData->getAccessToken(),
            $accessTokenIssueUseCaseOutputData->getRefreshToken(),
            $user
        );
    }
}
