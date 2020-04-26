<?php

namespace App\Domain;

use App\Exceptions\BusinessRequirementsException;

class AccessTokenToken
{
    const MAX_LENGTH = 255;

    public static function create(): AccessTokenToken
    {
        $token = str_random(60);
        return new AccessTokenToken($token);
    }

    public static function validate(string $token)
    {
        if (AccessTokenToken::MAX_LENGTH < strlen($token)) {
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
