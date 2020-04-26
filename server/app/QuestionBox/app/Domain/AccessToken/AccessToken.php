<?php

namespace App\Domain;

use Carbon\Carbon;

class AccessToken
{
    public static function create(
        AccessTokenId $id,
        AccessTokenExpiration $expiration,
        AccessTokenToken $token,
        UserId $userId,
        AccessTokenCreatedAt $createdAt,
        AccessTokenUpdatedAt $updatedAt
    ): AccessToken {
        return new AccessToken(
            $id,
            $expiration,
            $token,
            $userId,
            $createdAt,
            $updatedAt
        );
    }

    private $id;
    private $expiration;
    private $token;
    private $userId;
    private $createdAt;
    private $updatedAt;

    public function hasExpired(): bool
    {
        return $this->expiration->getValue()->gte(Carbon::today());
    }

    public function getId(): AccessTokenId
    {
        return $this->id;
    }

    public function getExpiration(): AccessTokenExpiration
    {
        return $this->expiration;
    }

    public function getToken(): AccessTokenToken
    {
        return $this->token;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getCreatedAt(): AccessTokenCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): AccessTokenUpdatedAt
    {
        return $this->updatedAt;
    }

    private function __construct(
        AccessTokenId $id,
        AccessTokenExpiration $expiration,
        AccessTokenToken $token,
        UserId $userId,
        AccessTokenCreatedAt $createdAt,
        AccessTokenUpdatedAt $updatedAt
    ) {
        $this->id = $id;
        $this->expiration = $expiration;
        $this->token = $token;
        $this->userId = $userId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}
