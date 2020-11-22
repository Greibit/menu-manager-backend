<?php


namespace App\Domain\Plate;


class CreatePlate
{
    private string $id;

    private string $name;

    private array $plateFoods;

    public function __construct(string $id, string $name, array $plateFoods = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->plateFoods = $plateFoods;
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