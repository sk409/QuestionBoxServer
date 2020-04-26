<?php

namespace App\UseCase;

use App\Domain\AccessTokenExpiration;
use App\Domain\AccessTokenToken;
use App\Domain\UserUserId;
use App\Exceptions\BusinessRequirementsException;
use App\Exceptions\ExpiredRefreshTokenException;
use App\Gateway\Repository\AccessTokenRepository;
use App\Gateway\Repository\RefreshTokenRepository;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class AccessTokenIssueInteractor implements AccessTokenIssueUseCase
{

    private $userExistenceConfirmationUseCase;
    private $refreshTokenIssueUseCase;

    private $accessTokenRepository;
    private $refreshTokenRepository;

    public function __construct(
        UserExistenceConfirmationUseCase $userExistenceConfirmationUseCase,
        RefreshTokenIssueUseCase $refreshTokenIssueUseCase,
        AccessTokenRepository $accessTokenRepository,
        RefreshTokenRepository $refreshTokenRepository
    ) {
        $this->userExistenceConfirmationUseCase = $userExistenceConfirmationUseCase;
        $this->refreshTokenIssueUseCase = $refreshTokenIssueUseCase;
        $this->accessTokenRepository = $accessTokenRepository;
        $this->refreshTokenRepository = $refreshTokenRepository;
    }

    public function execute(UserUserId $userId, string $rawPassword): AccessTokenIssueUseCaseOutputData
    {
        $userExistenceConfirmationUseCaseOutputData = $this->userExistenceConfirmationUseCase->execute($userId);
        if (!$userExistenceConfirmationUseCaseOutputData->getExistence()) {
            throw new ResourceNotFoundException("The user with the passed userId doen not exist");
        }
        $user = $userExistenceConfirmationUseCaseOutputData->getUser();
        $refreshToken = $this->refreshTokenRepository->findLatestTokenByUserId($user->getId());
        if ($refreshToken->hasExpired()) {
            throw new ExpiredRefreshTokenException();
        }
        $newRefreshToken = $this->refreshTokenIssueUseCase->execute($userId, $rawPassword);
        $accessToken = $this->accessTokenRepository->save(
            AccessTokenExpiration::create(),
            AccessTokenToken::create(),
            $user->getId()
        );
        return new AccessTokenIssueUseCaseOutputData($accessToken, $newRefreshToken);
    }
}
