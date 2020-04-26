<?php

namespace App;

use App\Domain\AccessToken as DomainAccessToken;
use App\Domain\AccessTokenCreatedAt;
use App\Domain\AccessTokenExpiration;
use App\Domain\AccessTokenId;
use App\Domain\AccessTokenToken;
use App\Domain\AccessTokenUpdatedAt;
use App\Domain\UserId;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    protected $fillable = ["token", "expiration", "user_id"];

    public function domain(): DomainAccessToken
    {
        return DomainAccessToken::create(
            AccessTokenId::create($this->id),
            AccessTokenExpiration::create(new Carbon($this->expiration)),
            AccessTokenToken::create($this->token),
            UserId::create($this->user_id),
            AccessTokenCreatedAt::create(new Carbon($this->created_at)),
            AccessTokenUpdatedAt::create(new Carbon($this->updated_at))
        );
    }
}
