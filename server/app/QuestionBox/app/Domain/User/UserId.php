<?php

namespace App\Domain;

use App\Exceptions\BusinessRequirementsException;

class UserId
{

    use IdTrait;

    public static function create(int $id): UserId
    {
        UserId::validate($id);
        return new UserId($id);
    }

    public static function resource(): string
    {
        return self::class;
    }
}
