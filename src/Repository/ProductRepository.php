<?php

// src/Repository/ProductRepository.php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @return Product[] Returns an array of Product objects
     */
    public function findBlueStones()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.color = :color')
            ->setParameter('color', 'blue')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
