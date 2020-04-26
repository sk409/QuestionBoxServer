<?php

namespace App\Http\Responses;

use App\Domain\RefreshToken;

class RefreshTokenResponse extends Response
{

    public $id;
    public $expiration;
    public $token;
    public $userId;
    public $createdAt;
    public $updatedAt;

    public function __construct(RefreshToken $refreshToken)
    {
        $this->id = $refreshToken->getId()->getValue();
        $this->expiration = $refreshToken->getExpiration()->getValue();
        $this->token = $refreshToken->getToken()->getValue();
        $this->userId = $refreshToken->getUserId()->getValue();
        $this->createdAt = $refreshToken->getCreatedAt()->getValue();
        $this->updatedAt = $refreshToken->getUpdatedAt()->getValue();
    }
}
