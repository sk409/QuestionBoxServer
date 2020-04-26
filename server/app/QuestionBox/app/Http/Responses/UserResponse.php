<?php

namespace App\Http\Responses;

use App\Domain\User;

class UserResponse extends Response
{

    public $name;
    public $userId;

    public function __construct(User $user)
    {
        $this->name = $user->getName()->getValue();
        $this->userId = $user->getUserId()->getValue();
    }
}
