<?php

namespace App\Infrastructure\Repository;

use App\Domain\Food\Food;
use App\Domain\Food\FoodRepository;
use App\Domain\Food\NutritionalInformation;
use App\Infrastructure\Entity\Food as FoodEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineFoodRepository extends ServiceEntityRepository implements FoodRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FoodEntity::class);
    }

    public function save(Food $food): void
    {
        $foodEntity = new FoodEntity($food->id(), $food->name());

        $nutritionalInformation = $food->nutritionalInformation();
        $foodEntity->setCalories($nutritionalInformation->calories());
        $foodEntity->setCarbohydrates($nutritionalInformation->carbohydrates());
        $foodEntity->setProtein($nutritionalInformation->protein());
        $foodEntity->setFats($nutritionalInformation->fats());
        $foodEntity->setFiber($nutritionalInformation->fiber());
        $foodEntity->setSugars($nutritionalInformation->sugars());

        $this->_em->persist($foodEntity);
        $this->_em->flush();
    }

    public function search(string $foodId): ?Food
    {
        /** @var FoodEntity $foodEntity */
        $foodEntity = $this->find($foodId);

        if (!$foodEntity) {
            return null;
        }

        $food = new Food(
            $foodEntity->getId(),
            $foodEntity->getName()
        );

        $nutritionalInformation = new NutritionalInformation(
            $foodEntity->getCalories(),
            $foodEntity->getCarbohydrates(),
            $foodEntity->getProtein(),
            $foodEntity->getFats(),
            $foodEntity->getFiber(),
            $foodEntity->getSugars()
        );

        $food->setNutritionalInformation($nutritionalInformation);

        return $food;
    }

}
