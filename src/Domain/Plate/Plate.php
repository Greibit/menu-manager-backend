<?php


namespace App\Domain\Plate;


class Plate
{
    public function __construct(
        private string $id,
        private string $name,
        private Ingredients $ingredients
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

    public function ingredients(): Ingredients
    {
        return $this->ingredients;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'ingredients' => $this->ingredients->toPrimitives(),
        ];
    }
}