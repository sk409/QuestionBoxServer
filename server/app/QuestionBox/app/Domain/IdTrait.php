<?php

namespace App\Domain;

use App\Exceptions\BusinessRequirementsException;

trait IdTrait
{
    public static abstract function resource(): string;

    public static function validate(int $id)
    {
        $min = 1;
        if ($id < $min) {
            BusinessRequirementsException::min(IdTrait::resource(), $min);
        }
    }

    private $id;

    public function getValue(): int
    {
        return $this->id;
    }

    private function __construct(int $id)
    {
        $this->id = $id;
    }
}
