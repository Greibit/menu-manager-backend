<?php

namespace App\Infrastructure\Controller;

use App\Application\Plate\PlateCreator;
use App\Domain\Plate\Plate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PlateController extends AbstractController
{
    private PlateCreator $plateCreator;

    public function __construct(
        PlateCreator $plateCreator
    )
    {
        $this->plateCreator = $plateCreator;
    }

    /**
     * @Route("/plate/{id}", name="create_plate", methods={"POST"})
     */
    public function createPlate(string $id, Request $request)
    {
        $this->plateCreator->create(new Plate($id, $request->request->get('name')));

        return $this->json([]);
    }
}
