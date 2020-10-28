<?php


namespace App\Domain\Food;


class NutritionalInformation
{
    private float $calories;

    private float $carbohydrates;

    private float $protein;

    private float $fats;

    private float $sugars;

    private float $fiber;

    public function __construct(
        float $calories,
        float $carbohydrates,
        float $protein,
        float $fats,
        float $sugars,
        float $fiber
    )
    {
        $this->calories = $calories;
        $this->carbohydrates = $carbohydrates;
        $this->protein = $protein;
        $this->fats = $fats;
        $this->sugars = $sugars;
        $this->fiber = $fiber;
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