<?php

namespace App;

use App\Domain\RefreshToken as DomainRefreshToken;
use App\Domain\RefreshTokenCreatedAt;
use App\Domain\RefreshTokenExpiration;
use App\Domain\RefreshTokenId;
use App\Domain\RefreshTokenToken;
use App\Domain\RefreshTokenUpdatedAt;
use App\Domain\UserId;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RefreshToken extends Model
{
    protected $fillable = ["token", "expiration", "user_id"];

    public function domain(): DomainRefreshToken
    {
        return DomainRefreshToken::create(
            RefreshTokenId::create($this->id),
            RefreshTokenExpiration::create(new Carbon($this->expiration)),
            RefreshTokenToken::create($this->token),
            UserId::create($this->user_id),
            RefreshTokenCreatedAt::create(new Carbon($this->created_at)),
            RefreshTokenUpdatedAt::create(new Carbon($this->updated_at))
        );
    }
}
