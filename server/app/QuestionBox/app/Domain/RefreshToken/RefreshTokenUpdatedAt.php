<?php

namespace App\Domain;

use Carbon\Carbon;

class RefreshTokenUpdatedAt
{
    use UpdatedAtTrait;

    public static function create(Carbon $updatedAt): RefreshTokenUpdatedAt
    {
        return new RefreshTokenUpdatedAt($updatedAt);
    }

    public static function resource(): string
    {
        return self::class;
    }
}
