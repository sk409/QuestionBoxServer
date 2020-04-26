<?php

namespace App\UseCase;

use App\Domain\AccessToken;
use App\Domain\RefreshToken;
use App\Domain\UserUserId;

interface AccessTokenIssueUseCase
{
    public function execute(UserUserId $userId, string $rawPassword): AccessTokenIssueUseCaseOutputData;
}

class AccessTokenIssueUseCaseOutputData
{
    private $accessToken;
    private $refreshToken;

    public function __construct(AccessToken $accessToken, RefreshToken $refreshToken)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }

    public function getAccessToken(): AccessToken
    {
        return $this->accessToken;
    }

    public function getRefreshToken(): RefreshToken
    {
        return $this->refreshToken;
    }
}
