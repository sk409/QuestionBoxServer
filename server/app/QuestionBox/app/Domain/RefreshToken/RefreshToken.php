<?php

namespace App\Domain;

use Carbon\Carbon;

class RefreshToken
{

    public static function create(
        RefreshTokenId $id,
        RefreshTokenExpiration $expiration,
        RefreshTokenToken $token,
        UserId $userId,
        RefreshTokenCreatedAt $createdAt,
        RefreshTokenUpdatedAt $updatedAt
    ): RefreshToken {
        return new RefreshToken(
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
        return $this->expiration->getValue()->lt(Carbon::today());
    }

    public function getId(): RefreshTokenId
    {
        return $this->id;
    }

    public function getExpiration(): RefreshTokenExpiration
    {
        return $this->expiration;
    }

    public function getToken(): RefreshTokenToken
    {
        return $this->token;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getCreatedAt(): RefreshTokenCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): RefreshTokenUpdatedAt
    {
        return $this->updatedAt;
    }

    private function __construct(
        RefreshTokenId $id,
        RefreshTokenExpiration $expiration,
        RefreshTokenToken $token,
        UserId $userId,
        RefreshTokenCreatedAt $createdAt,
        RefreshTokenUpdatedAt $updatedAt
    ) {
        $this->id = $id;
        $this->expiration = $expiration;
        $this->token = $token;
        $this->userId = $userId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}
