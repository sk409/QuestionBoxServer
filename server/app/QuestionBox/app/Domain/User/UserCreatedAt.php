<?php

namespace App\Domain;

use Carbon\Carbon;

class UserCreatedAt
{

    use CreatedAtTrait;

    public static function create(Carbon $createdAt): UserCreatedAt
    {
        return new UserCreatedAt($createdAt);
    }

    public static function resource(): string
    {
        return self::class;
    }
}
