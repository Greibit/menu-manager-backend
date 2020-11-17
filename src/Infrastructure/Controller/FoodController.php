<?php

namespace App\Infrastructure\Controller;

use App\Application\Food\FoodCreator;
use App\Application\Food\FoodFinder;
use App\Domain\Food\Food;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FoodController extends AbstractController
{
    private FoodCreator $foodCreator;
    private FoodFinder $foodFinder;

    public function __construct(
        FoodCreator $foodCreator,
        FoodFinder $foodFinder
    )
    {
        $this->foodCreator = $foodCreator;
        $this->foodFinder = $foodFinder;
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

    /**
     * @Route("/food/{id}", name="find_food", methods={"GET"})
     */
    public function findFood(string $id)
    {
        return $this->json($this->foodFinder->find($id));
    }
}
