<?php


namespace App\Application\Plate;


use App\Domain\Plate\Plate;
use App\Domain\Plate\PlateRepository;

class PlateCreator
{
    private PlateRepository $plateRepository;

    public function __construct(
        PlateRepository $plateRepository
    )
    {
        $this->plateRepository = $plateRepository;
    }

    public function create(Plate $plate)
    {
        $this->plateRepository->save($plate);
    }
}