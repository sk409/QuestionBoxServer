<?php

namespace App\Gateway\Repository;

use App\Domain\User;
use App\Domain\UserName;
use App\Domain\UserPassword;
use App\Domain\UserUserId;

interface UserRepository
{
    public function findFirstByUserId(UserUserId $userId): ?User;
    public function save(UserName $name, UserPassword $password, UserUserId $userId): User;
}
