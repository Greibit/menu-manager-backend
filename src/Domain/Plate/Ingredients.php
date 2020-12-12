<?php

namespace App\Domain\Plate;


use App\Domain\Collection;

class Ingredients extends Collection
{
    protected function type(): string
    {
        return Ingredient::class;
    }

    public function toPrimitives(): array
    {
        return array_map(function($item) {
            return $item->toPrimitives();
        }, $this->items());
    }
}
