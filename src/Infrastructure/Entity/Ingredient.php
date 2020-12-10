<?php

namespace App\Infrastructure\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Plate")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plate;

    /**
     * @ORM\ManyToOne(targetEntity="Food")
     * @ORM\JoinColumn(nullable=false)
     */
    private $food;

    /**
     * @ORM\Column(type="integer")
     */
    private $grams;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getPlate(): Plate
    {
        return $this->plate;
    }

    public function setPlate($plate): void
    {
        $this->plate = $plate;
    }

    public function getFood(): Food
    {
        return $this->food;
    }

    public function setFood($food): void
    {
        $this->food = $food;
    }

    public function getGrams(): int
    {
        return $this->grams;
    }

    public function setGrams($grams): void
    {
        $this->grams = $grams;
    }

}
