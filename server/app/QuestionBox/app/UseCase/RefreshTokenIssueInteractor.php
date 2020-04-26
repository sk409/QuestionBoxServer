<?php

namespace App\UseCase;

use App\Domain\RefreshToken;
use App\Domain\RefreshTokenExpiration;
use App\Domain\RefreshTokenToken;
use App\Domain\UserUserId;
use App\Exceptions\BadCredentialsException;
use App\Gateway\Repository\RefreshTokenRepository;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class RefreshTokenIssueInteractor implements RefreshTokenIssueUseCase
{

    private $refreshTokenRepository;
    private $userExistenceConfirmationUseCase;

    public function __construct(RefreshTokenRepository $refreshTokenRepository, UserExistenceConfirmationUseCase $userExistenceConfirmationUseCase)
    {
        $this->refreshTokenRepository = $refreshTokenRepository;
        $this->userExistenceConfirmationUseCase = $userExistenceConfirmationUseCase;
    }

    public function execute(UserUserId $userId, string $rawPassword): RefreshToken
    {
        $userExistenceConfirmationUseCaseOutputData = $this->userExistenceConfirmationUseCase->execute($userId);
        if (!$userExistenceConfirmationUseCaseOutputData->getExistence()) {
            throw new NotFoundResourceException("The user with the passed userId doen not exist");
        }
        $user = $userExistenceConfirmationUseCaseOutputData->getUser();
        if (!Hash::check($rawPassword, $user->getPassword()->getValue())) {
            throw new BadCredentialsException();
        }
        return $this->refreshTokenRepository->save(
            RefreshTokenExpiration::create(),
            RefreshTokenToken::create(),
            $user->getId()
        );
    }
}
