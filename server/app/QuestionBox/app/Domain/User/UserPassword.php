<?php

namespace App\Domain;

use App\Exceptions\BusinessRequirementsException;

class UserPassword
{
    const MAX_LENGTH = 255;

    public static function create(string $password): UserPassword
    {
        self::validate($password);
        return new UserPassword($password);
    }

    public static function validate(string $password)
    {
        if (UserPassword::MAX_LENGTH < mb_strlen($password)) {
            throw BusinessRequirementsException::maxLength(self::class, self::MAX_LENGTH);
        }
    }

    private $password;

    public function getValue(): string
    {
        return $this->password;
    }

    public function setValue(string $password)
    {
        self::validate($password);
        $this->password = $password;
    }

    private function __construct(string $password)
    {
        $this->password = $password;
    }
}
