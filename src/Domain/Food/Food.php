<?php


namespace App\Domain\Food;


class Food
{
    private string $id;

    private string $name;

    private ?NutritionalInformation $nutritionalInformation = null;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

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

}