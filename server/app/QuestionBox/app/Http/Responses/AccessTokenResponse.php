<?php

namespace App\Http\Responses;

use App\Domain\AccessToken;

class AccessTokenResponse extends Response
{

    public $id;
    public $expiration;
    public $token;
    public $userId;
    public $createdAt;
    public $updatedAt;

    public function __construct(AccessToken $accessToken)
    {
        $this->id = $accessToken->getId()->getValue();
        $this->expiration = $accessToken->getExpiration()->getValue();
        $this->token = $accessToken->getToken()->getValue();
        $this->userId = $accessToken->getUserId()->getValue();
        $this->createdAt = $accessToken->getCreatedAt()->getValue();
        $this->updatedAt = $accessToken->getUpdatedAt()->getValue();
    }
}
