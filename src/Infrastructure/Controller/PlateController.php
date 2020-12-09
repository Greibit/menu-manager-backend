<?php

namespace App\Infrastructure\Controller;

use App\Application\Plate\PlateCreator;
use App\Domain\Plate\Plate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PlateController extends AbstractController
{
    public function __construct(
        private PlateCreator $plateCreator
    )
    {
    }

    /**
     * @Route("/plate/{id}", name="create_plate", methods={"POST"})
     */
    public function createPlate(string $id, Request $request): JsonResponse
    {
        $this->plateCreator->create(new Plate($id, $request->request->get('name')));

        return $this->json([]);
    }
}
