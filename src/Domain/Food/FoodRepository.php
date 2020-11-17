<?php


namespace App\Domain\Food;


interface FoodRepository
{
    public function search(string $foodId): ?Food;

    public function save(Food $food): void;
}