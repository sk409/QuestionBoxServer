<?php

namespace App\Domain;

use Carbon\Carbon;

class AccessTokenCreatedAt
{

    use CreatedAtTrait;

    public static function create(Carbon $createdAt): AccessTokenCreatedAt
    {
        return new AccessTokenCreatedAt($createdAt);
    }

    public static function resource(): string
    {
        return self::class;
    }
}
