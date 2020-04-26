<?php

namespace App\Domain;

use Carbon\Carbon;

class RefreshTokenCreatedAt
{

    use CreatedAtTrait;

    public static function create(Carbon $createdAt): RefreshTokenCreatedAt
    {
        return new RefreshTokenCreatedAt($createdAt);
    }

    public static function resource(): string
    {
        return self::class;
    }
}
