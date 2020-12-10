<?php

namespace App\Infrastructure\Entity;

use App\Infrastructure\Repository\DoctrinePlateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DoctrinePlateRepository::class)
 */
class Plate
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
     * @ORM\OneToMany(targetEntity="Ingredient", mappedBy="plate", fetch="EXTRA_LAZY")
     */
    private $ingredients;

    public function __construct(string $id, string $name, array $ingredients = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->ingredients = $ingredients;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }



}
