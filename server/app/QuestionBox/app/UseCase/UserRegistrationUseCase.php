<?php

namespace App\UseCase;

use App\Domain\AccessToken;
use App\Domain\RefreshToken;
use App\Domain\User;
use App\Domain\UserName;
use App\Domain\UserUserId;

interface UserRegistrationUseCase
{
    public function execute(UserName $name, UserUserId $userId, string $rawPassword): UserRegistrationUseCaseOutputData;
}

class UserRegistrationUseCaseOutputData
{
    private $accessToken;
    private $refreshToken;
    private $user;

    public function __construct(AccessToken $accessToken, RefreshToken $refreshToken, User $user)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->user = $user;
    }

    public function getAccessToken(): AccessToken
    {
        return $this->accessToken;
    }

    public function getRefreshToken(): RefreshToken
    {
        return $this->refreshToken;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
