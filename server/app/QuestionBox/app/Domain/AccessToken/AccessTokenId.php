<?php

namespace App\Domain;

class AccessTokenId
{

    use IdTrait;

    public static function create(int $id): AccessTokenId
    {
        self::validate($id);
        return new AccessTokenId($id);
    }

    public static function resource(): string
    {
        return self::class;
    }
}
