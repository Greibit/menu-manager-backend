<?php

namespace App\Infrastructure\Controller;

use App\Application\Food\FoodCreator;
use App\Application\Food\FoodFinder;
use App\Domain\Food\Food;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FoodController extends AbstractController
{
    public function __construct(
        private FoodCreator $foodCreator,
        private FoodFinder $foodFinder
    )
    {
    }

    /**
     * @Route("/food/{id}", name="create_food", methods={"POST"})
     */
    public function createFood(string $id, Request $request): JsonResponse
    {
        $this->foodCreator->create(new Food($id, $request->request->get('name')));

        return $this->json([]);
    }

    /**
     * @Route("/food/{id}", name="find_food", methods={"GET"})
     */
    public function findFood(string $id): JsonResponse
    {
        return $this->json($this->foodFinder->find($id)->toPrimitives());
    }
}
