<?php


namespace App\Application\Food;


use App\Domain\Food\FoodNotExists;
use App\Domain\Food\FoodRepository;

class FoodFinder
{
    private FoodRepository $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    public function find(string $foodId)
    {
        $food = $this->foodRepository->search($foodId);

        if (null === $food) {
            throw new FoodNotExists($foodId);
        }

        return $food;
    }
}