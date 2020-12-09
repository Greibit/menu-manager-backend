<?php


namespace App\Domain\Plate\Create;


class CreatePlateFood
{
    public function __construct(
        private string $id,
        private string $foodId,
        private string $grams
    )
    {
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