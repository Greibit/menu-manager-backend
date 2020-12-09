<?php


namespace App\Application\Food;


use App\Domain\Food\Food;
use App\Domain\Food\FoodNotExists;
use App\Domain\Food\FoodRepository;

class FoodFinder
{
    public function __construct(
        private FoodRepository $foodRepository
    )
    {
    }

    public function find(string $foodId): Food
    {
        $food = $this->foodRepository->search($foodId);

        if (null === $food) {
            throw new FoodNotExists($foodId);
        }

        return $food;
    }
}