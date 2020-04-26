<?php

namespace App\Domain;

use App\Exceptions\BusinessRequirementsException;

class UserName
{

    const MAX_LENGTH = 64;

    public static function create(string $name): UserName
    {
        self::validate($name);
        return new UserName($name);
    }

    public static function validate(string $name)
    {
        if (self::MAX_LENGTH < mb_strlen($name)) {
            throw BusinessRequirementsException::maxLength(self::class, self::MAX_LENGTH);
        }
    }

    private $name;

    public function getValue(): string
    {
        return $this->name;
    }

    public function setValue(string $name)
    {
        self::validate($name);
        $this->name = $name;
    }

    private function __construct(string $name)
    {
        $this->name = $name;
    }
}
