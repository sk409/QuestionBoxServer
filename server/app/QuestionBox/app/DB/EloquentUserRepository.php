<?php

namespace App\DB;

use App\Domain\User as DomainUser;
use App\Domain\UserName;
use App\Domain\UserPassword;
use App\Domain\UserUserId;
use App\Gateway\Repository\UserRepository;
use App\User as EloquentUser;

class EloquentUserRepository implements UserRepository
{

    public function findFirstByUserId(UserUserId $userId): ?DomainUser
    {
        $user = EloquentUser::where(
            "user_id",
            $userId->getValue()
        )->first();
        return is_null($user) ? null : $user->domain();
    }

    public function save(UserName $name, UserPassword $password, UserUserId $userId): DomainUser
    {
        $user = EloquentUser::create([
            "name" => $name->getValue(),
            "password" => $password->getValue(),
            "user_id" => $userId->getValue()
        ]);
        return $user->domain();
    }
}
