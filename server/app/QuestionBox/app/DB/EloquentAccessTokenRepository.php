<?php

namespace App\DB;

use App\AccessToken as EloquentAccessToken;
use App\Domain\AccessToken as DomainAccessToken;
use App\Domain\AccessTokenExpiration;
use App\Domain\AccessTokenToken;
use App\Domain\UserId;
use App\Gateway\Repository\AccessTokenRepository;

class EloquentAccessTokenRepository implements AccessTokenRepository
{
    public function save(AccessTokenExpiration $expiration, AccessTokenToken $token, UserId $userId): DomainAccessToken
    {
        $accessToken = EloquentAccessToken::create([
            "expiration" => $expiration->getValue(),
            "token" => $token->getValue(),
            "user_id" => $userId->getValue()
        ]);
        return $accessToken->domain();
    }
}
