<?php

namespace App\Domain;

use Carbon\Carbon;

class AccessTokenExpiration
{

    public static function create(): AccessTokenExpiration
    {
        $expiration = new Carbon();
        $expiration->addMonths(6);
        return new AccessTokenExpiration($expiration);
    }

    private $expiration;

    public function getValue(): Carbon
    {
        return $this->expiration;
    }

    private function __construct(Carbon $expiration)
    {
        $this->expiration = $expiration;
    }
}
