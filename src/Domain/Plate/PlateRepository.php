<?php


namespace App\Domain\Plate;


interface PlateRepository
{
    public function save(Plate $plate): void;
}