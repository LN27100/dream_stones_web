<?php

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


    // Méthode pour récupérer les produits par catégorie
    public function findByCategory($category)
    {
        return $this->createQueryBuilder('p')
            ->join('p.type', 't')
            ->andWhere('t.typeCategory = :category')
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult();
    }

    // Méthode pour la recherche des pierres
public function findBySearchTerm(string $searchTerm): array
{
    return $this->createQueryBuilder('p')
        ->where('p.productName LIKE :searchTerm')
        ->setParameter('searchTerm', '%' . $searchTerm . '%')
        ->getQuery()
        ->getResult();
}
}
