<?php

namespace App\Domain;

use App\Exceptions\BusinessRequirementsException;

class UserUserId
{

    const MAX_LENGTH = 32;

    static function create(string $userId): UserUserId
    {
        self::validate($userId);
        return new UserUserId($userId);
    }

    static function validate(string $userId)
    {
        if (self::MAX_LENGTH < mb_strlen($userId)) {
            throw BusinessRequirementsException::maxLength(self::class, self::MAX_LENGTH);
        }
    }

    private $userId;

    public function getValue(): string
    {
        return $this->userId;
    }

    public function setValue(string $userId)
    {
        self::validate($userId);
        $this->userId = $userId;
    }

    private function __construct(string $userId)
    {
        $this->userId = $userId;
    }
}
