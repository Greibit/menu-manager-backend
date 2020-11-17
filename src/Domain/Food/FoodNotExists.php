<?php


namespace App\Domain\Food;


class FoodNotExists extends \Exception
{

    public function __construct(string $foodId)
    {
        parent::__construct(sprintf('The food <%s> does not exist', $foodId));
    }
}