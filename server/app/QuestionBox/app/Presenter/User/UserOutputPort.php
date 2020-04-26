<?php

namespace App\Presenter;

use App\Domain\User;

interface UserOutputPort
{
    public function present(User $user, $paramter): object;
}
