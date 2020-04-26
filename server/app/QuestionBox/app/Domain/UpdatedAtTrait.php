<?php

namespace App\Domain;

use Carbon\Carbon;

trait UpdatedAtTrait
{
    private $updatedAt;

    public function getValue(): Carbon
    {
        return $this->updatedAt;
    }

    private function __construct(Carbon $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}
