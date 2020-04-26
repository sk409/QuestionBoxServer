<?php

namespace App\Gateway\Repository;

use App\Domain\AccessToken;
use App\Domain\AccessTokenExpiration;
use App\Domain\AccessTokenToken;
use App\Domain\UserId;

interface AccessTokenRepository
{
    public function save(AccessTokenExpiration $expiration, AccessTokenToken $token, UserId $userId): AccessToken;
}
