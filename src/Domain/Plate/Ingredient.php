<?php

namespace App\Domain\Plate;


class Ingredient
{
    public function __construct(
        private float $grams,
        private string $foodId
    )
    {
    }

    public function grams(): float
    {
        return $this->grams;
    }

    public function foodId(): string
    {
        return $this->foodId;
    }


}
