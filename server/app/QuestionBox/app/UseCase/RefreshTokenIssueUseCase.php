<?php

namespace App\UseCase;

use App\Domain\UserUserId;

interface RefreshTokenIssueUseCase
{
    public function execute(UserUserId $userId, string $rawPassword);
}
