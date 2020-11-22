<?php


namespace App\Domain\Plate;


class CreatePlateFood
{
    private string $id;

    private string $foodId;

    private string $grams;

    public function __construct(string $id, string $foodId, string $grams)
    {
        $this->id = $id;
        $this->foodId = $foodId;
        $this->grams = $grams;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function foodId(): string
    {
        return $this->foodId;
    }

    public function grams(): string
    {
        return $this->grams;
    }

}