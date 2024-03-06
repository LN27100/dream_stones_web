<?php


namespace App\Repository;

use App\Entity\Userprofil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserprofilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Userprofil::class);
    }

    public function findOneByEmail(string $email): ?Userprofil
    {
        // Débogage : Affichez l'email recherché
        dump('Searching for user with email: ' . $email);

        // Recherchez l'utilisateur dans la base de données par son email
        $user = $this->createQueryBuilder('u')
            ->andWhere('u.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();

        // Débogage : Affichez le résultat de la recherche
        if ($user) {
            dump('User found:');
            dump($user);
        } else {
            dump('User not found.');
        }

        return $user;
    }
}