<?php


namespace App\Domain\Plate\Create;


class CreatePlate
{
    public function __construct(
        private string $id,
        private string $name,
        private array $plateFoods = []
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function plateFoods(): array
    {
        return $this->plateFoods;
    }

}