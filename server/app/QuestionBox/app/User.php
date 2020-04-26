<?php

namespace App;

use App\Domain\User as DomainUser;
use App\Domain\UserCreatedAt;
use App\Domain\UserId;
use App\Domain\UserName;
use App\Domain\UserPassword;
use App\Domain\UserUpdatedAt;
use App\Domain\UserUserId;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function refreshToken(): ?RefreshToken
    {
        return $this->refreshTokens()->orderBy("id", "desc")->first();
    }

    public function refreshTokens(): HasMany
    {
        return $this->hasMany(RefreshToken::class);
    }

    public function domain(): DomainUser
    {
        return DomainUser::create(
            UserId::create($this->id),
            UserName::create($this->name),
            UserPassword::create($this->password),
            UserUserId::create($this->user_id),
            UserCreatedAt::create($this->created_at),
            UserUpdatedAt::create($this->updated_at)
        );
    }
}
