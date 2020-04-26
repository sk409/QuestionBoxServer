<?php

namespace App\Domain;

use Carbon\Carbon;

class RefreshTokenExpiration
{

    public static function create(): RefreshTokenExpiration
    {
        $expiration = new Carbon();
        $expiration->addMonths(6);
        return new RefreshTokenExpiration($expiration);
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
