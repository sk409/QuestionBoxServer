<?php

namespace App\Domain;

use Carbon\Carbon;

class AccessTokenUpdatedAt
{
    use UpdatedAtTrait;

    public static function create(Carbon $updatedAt): AccessTokenUpdatedAt
    {
        return new AccessTokenUpdatedAt($updatedAt);
    }

    public static function resource(): string
    {
        return self::class;
    }
}
