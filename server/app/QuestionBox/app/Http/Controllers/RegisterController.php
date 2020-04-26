<?php

namespace App\Http\Controllers;

use App\Domain\UserName;
use App\Domain\UserUserId;
use App\Http\Requests\RegistrationRequest;
use App\Http\Responses\UserRegistrationResponse;
use App\UseCase\UserRegistrationUseCase;

class RegisterController extends Controller
{

    private $userRegistrationUseCase;

    public function __construct(UserRegistrationUseCase $userRegistrationUseCase)
    {
        $this->userRegistrationUseCase = $userRegistrationUseCase;
    }

    public function register(RegistrationRequest $request)
    {
        $userRegistrationUseCaseOutputData = $this->userRegistrationUseCase->execute(
            UserName::create($request->name),
            UserUserId::create($request->userId),
            $request->password,
        );
        return new UserRegistrationResponse(
            $userRegistrationUseCaseOutputData->getAccessToken(),
            $userRegistrationUseCaseOutputData->getRefreshToken(),
            $userRegistrationUseCaseOutputData->getUser()
        );
    }
}
