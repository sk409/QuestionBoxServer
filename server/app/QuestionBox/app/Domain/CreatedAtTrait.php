<?php

namespace App\Domain;

use Carbon\Carbon;

trait CreatedAtTrait
{

    private $createdAt;

    public function getValue(): Carbon
    {
        return $this->createdAt;
    }

    private function __construct(Carbon $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
