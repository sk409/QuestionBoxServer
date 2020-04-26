<?php

namespace App\Domain;

use App\Exceptions\BusinessRequirementsException;

class RefreshTokenId
{

    use IdTrait;

    public static function create(int $id): RefreshTokenId
    {
        self::validate($id);
        return new RefreshTokenId($id);
    }

    public static function resource(): string
    {
        return self::class;
    }
}
