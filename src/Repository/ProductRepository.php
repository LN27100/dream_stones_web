<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductRepository extends ServiceEntityRepository
{
    // Appel du constructeur parent avec le registre et la classe de l'entité associée
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    // Recherche des produits par nom
    public function findByProductName($searchTerm)
    {
        return $this->createQueryBuilder('p')
            ->where('p.productName LIKE :searchTerm')
            ->setParameter('searchTerm', '%' . $searchTerm . '%')
            ->getQuery()
            ->getResult();
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

    public function findByCriteria($categories, $colors)
{
    $queryBuilder = $this->createQueryBuilder('p');

    if ($categories) {
        $queryBuilder->join('p.type', 't')
            ->andWhere('t.typeCategory IN (:categories)')
            ->setParameter('categories', $categories);
    }

    if ($colors) {
        $queryBuilder->andWhere('p.productColor IN (:colors)')
            ->setParameter('colors', $colors);
    }

    return $queryBuilder->getQuery()->getResult();
}
}
