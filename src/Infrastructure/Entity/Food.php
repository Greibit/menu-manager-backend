<?php

namespace App\Infrastructure\Entity;

use App\Infrastructure\Repository\DoctrineFoodRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DoctrineFoodRepository::class)
 */
class Food
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, options={"default" : 0})
     */
    private $calories = 0;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, options={"default" : 0})
     */
    private $carbohydrates = 0;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, options={"default" : 0})
     */
    private $protein = 0;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, options={"default" : 0})
     */
    private $fats = 0;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, options={"default" : 0})
     */
    private $sugars = 0;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, options={"default" : 0})
     */
    private $fiber = 0;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCalories(): ?string
    {
        return $this->calories;
    }

    public function setCalories(string $calories): self
    {
        $this->calories = $calories;

        return $this;
    }

    public function getCarbohydrates(): ?string
    {
        return $this->carbohydrates;
    }

    public function setCarbohydrates(string $carbohydrates): self
    {
        $this->carbohydrates = $carbohydrates;

        return $this;
    }

    public function getProtein(): ?string
    {
        return $this->protein;
    }

    public function setProtein(string $protein): self
    {
        $this->protein = $protein;

        return $this;
    }

    public function getFats(): ?string
    {
        return $this->fats;
    }

    public function setFats(string $fats): self
    {
        $this->fats = $fats;

        return $this;
    }

    public function getSugars(): ?string
    {
        return $this->sugars;
    }

    public function setSugars(string $sugars): self
    {
        $this->sugars = $sugars;

        return $this;
    }

    public function getFiber(): ?string
    {
        return $this->fiber;
    }

    public function setFiber(string $fiber): self
    {
        $this->fiber = $fiber;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }


}
