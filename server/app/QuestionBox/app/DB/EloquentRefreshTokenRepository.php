<?php

namespace App\DB;

use App\Domain\RefreshToken as DomainRefreshToken;
use App\Domain\RefreshTokenExpiration;
use App\Domain\RefreshTokenToken;
use App\Domain\UserId;
use App\Gateway\Repository\RefreshTokenRepository;
use App\RefreshToken as EloquentRefreshToken;

class EloquentRefreshTokenRepository implements RefreshTokenRepository
{

    public function findLatestTokenByUserId(UserId $userId): ?DomainRefreshToken
    {
        $refreshToken = EloquentRefreshToken::where("user_id", $userId->getValue())->orderBy("id", "desc")->first();
        return $refreshToken->domain();
    }

    public function save(RefreshTokenExpiration $expiration, RefreshTokenToken $token, UserId $userId): DomainRefreshToken
    {
        $refreshToken = EloquentRefreshToken::create([
            "expiration" => $expiration->getValue(),
            "token" => $token->getValue(),
            "user_id" => $userId->getValue()
        ]);
        return $refreshToken->domain();
    }
}
