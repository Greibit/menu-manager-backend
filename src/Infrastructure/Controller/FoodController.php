<?php

namespace App\Infrastructure\Controller;

use App\Application\Food\FoodCreator;
use App\Domain\Food\Food;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FoodController extends AbstractController
{
    private FoodCreator $foodCreator;

    public function __construct(FoodCreator $foodCreator)
    {
        $this->foodCreator = $foodCreator;
    }

    /**
     * @Route("/food", name="food")
     */
    public function createFood()
    {

        //TODO use Uuid generator for ID

        $this->foodCreator->create(new Food(uniqid(), 'Naranja'));

        return $this->json([]);
    }
}
