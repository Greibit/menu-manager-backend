<?php


namespace App\Domain\Food;


class Food
{
    public function __construct(
        private string $id,
        private string $name
    )
    {
    }

    private ?NutritionalInformation $nutritionalInformation = null;


    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function nutritionalInformation(): NutritionalInformation
    {
        return $this->nutritionalInformation;
    }

    public function setNutritionalInformation(NutritionalInformation $nutritionalInformation)
    {
        $this->nutritionalInformation = $nutritionalInformation;
    }

    public function toPrimitives()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nutritionalInformation' => $this->nutritionalInformation?->toPrimitives(),
        ];
    }

}