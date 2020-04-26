<?php

namespace App\Http\Responses;

use App\Domain\AccessToken;
use App\Domain\RefreshToken;
use App\Domain\User;

class UserRegistrationResponse extends Response
{

    public $accessToken;
    public $refreshToken;
    public $user;

    public function __construct(AccessToken $accessToken, RefreshToken $refreshToken, User $user)
    {
        $this->accessToken = new AccessTokenResponse($accessToken);
        $this->refreshToken = new RefreshTokenResponse($refreshToken);
        $this->user = new UserResponse($user);
    }
}
