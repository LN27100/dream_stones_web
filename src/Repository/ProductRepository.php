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

// Méthode pour récupérer les produits par catégories
public function findByCategories($categories)
{
    return $this->createQueryBuilder('p')
        ->join('p.type', 't')
        ->andWhere('t.typeCategory IN (:categories)')
        ->setParameter('categories', $categories)
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
 
// Méthode pour récupérer les produits par couleurs
public function findByColors($colors)
{
    return $this->createQueryBuilder('p')
        ->andWhere('p.productColor IN (:colors)')
        ->setParameter('colors', $colors)
        ->getQuery()
        ->getResult();
}

// Méthode pour récupérer les produits par catégories et couleurs
public function findByCategoriesAndColors($categories, $colors)
{
    return $this->createQueryBuilder('p')
        ->join('p.type', 't')
        ->andWhere('t.typeCategory IN (:categories)')
        ->setParameter('categories', $categories)
        ->andWhere('p.productColor IN (:colors)')
        ->setParameter('colors', $colors)
        ->getQuery()
        ->getResult();
}

}
