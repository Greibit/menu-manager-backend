<?php


namespace App\Domain\Food;


interface NutritionalInformationProvider
{
    public function getByFoodName(string $foodName): NutritionalInformation;
}