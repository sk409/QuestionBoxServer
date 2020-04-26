<?php

namespace App\Presenter;

use App\Domain\User;
use App\Http\Responses\UserResponse;

class UserPresenter implements UserOutputPort
{


    public function present(User $user, $paramter): object
    {
        $response = new UserResponse($user);
        return $response;
    }
}
