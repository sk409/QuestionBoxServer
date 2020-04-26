<?php

namespace App\Domain;

use App\Exceptions\BusinessRequirementsException;

class RefreshTokenToken
{
    const MAX_LENGTH = 255;

    public static function create(): RefreshTokenToken
    {
        $token = str_random(60);
        return new RefreshTokenToken($token);
    }

    public static function validate(string $token)
    {
        if (RefreshTokenToken::MAX_LENGTH < strlen($token)) {
            throw BusinessRequirementsException::maxLength(self::class, self::MAX_LENGTH);
        }
    }

    private $token;

    public function getValue(): string
    {
        return $this->token;
    }

    private function __construct(string $token)
    {
        $this->token = $token;
    }
}
