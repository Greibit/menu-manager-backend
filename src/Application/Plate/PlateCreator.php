<?php


namespace App\Application\Plate;


use App\Domain\Plate\Plate;
use App\Domain\Plate\PlateRepository;

class PlateCreator
{
    public function __construct(
        private PlateRepository $plateRepository
    )
    {
    }

    public function create(Plate $plate)
    {
        $this->plateRepository->save($plate);
    }
}