<?php

namespace App\Gateway\Repository;

use App\Domain\RefreshToken;
use App\Domain\RefreshTokenExpiration;
use App\Domain\RefreshTokenToken;
use App\Domain\UserId;

interface RefreshTokenRepository
{
    public function findLatestTokenByUserId(UserId $userId): ?RefreshToken;
    public function save(RefreshTokenExpiration $expiration, RefreshTokenToken $token, UserId $userId): RefreshToken;
}
