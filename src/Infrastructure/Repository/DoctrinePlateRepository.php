<?php

namespace App\Infrastructure\Repository;

use App\Domain\Plate\Plate;
use App\Domain\Plate\PlateRepository;
use App\Infrastructure\Entity\Plate as PlateEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrinePlateRepository extends ServiceEntityRepository implements PlateRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlateEntity::class);
    }

    public function save(Plate $plate): void
    {
        $plateEntity = new PlateEntity($plate->id(), $plate->name());
        $this->_em->persist($plateEntity);
        $this->_em->flush();

        foreach ($plate->ingredients()->getIterator() as $ingredient) {
            $this->_em->getConnection()->insert('ingredient', [
                'plate_id' => $plateEntity->getId(),
                'food_id' => $ingredient->foodId(),
                'grams' => $ingredient->grams(),
            ]);
        }
    }

    public function search(string $plateId): ?Plate
    {
        /** @var PlateEntity $plateEntity */
        $plateEntity = $this->find($plateId);

        return new Plate(
            $plateEntity->getId(),
            $plateEntity->getName()
        );
    }

}
