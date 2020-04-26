<?php

namespace App\Domain;

use Carbon\Carbon;

class UserUpdatedAt
{

    use UpdatedAtTrait;

    public static function create(Carbon $updatedAt): UserUpdatedAt
    {
        return new UserUpdatedAt($updatedAt);
    }

    public static function resource(): string
    {
        return self::class;
    }
}
