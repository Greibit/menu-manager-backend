<?php


namespace App\Domain\Food;


interface FoodRepository
{
    public function save(Food $food): void;
}