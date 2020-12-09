<?php


namespace App\Domain\Food;


class NutritionalInformation
{
    public function __construct(
        private float $calories,
        private float $carbohydrates,
        private float $protein,
        private float $fats,
        private float $sugars,
        private float $fiber
    )
    {
    }

    public function calories(): float
    {
        return $this->calories;
    }

    public function carbohydrates(): float
    {
        return $this->carbohydrates;
    }

    public function protein(): float
    {
        return $this->protein;
    }

    public function fats(): float
    {
        return $this->fats;
    }

    public function sugars(): float
    {
        return $this->sugars;
    }

    public function fiber(): float
    {
        return $this->fiber;
    }

}