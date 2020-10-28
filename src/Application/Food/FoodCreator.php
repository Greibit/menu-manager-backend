<?php


namespace App\Application\Food;


use App\Domain\Food\Food;
use App\Domain\Food\FoodRepository;
use App\Domain\Food\NutritionalInformationProvider;

class FoodCreator
{
    private FoodRepository $foodRepository;
    private NutritionalInformationProvider $nutritionalInformationProvider;

    public function __construct(
        FoodRepository $foodRepository,
        NutritionalInformationProvider $nutritionalInformationProvider
    )
    {
        $this->foodRepository = $foodRepository;
        $this->nutritionalInformationProvider = $nutritionalInformationProvider;
    }

    public function create(Food $food)
    {
        $nutritionalInformation = $this->nutritionalInformationProvider->getByFoodName($food->name());

        $food->setNutritionalInformation($nutritionalInformation);

        $this->foodRepository->save($food);
    }
}