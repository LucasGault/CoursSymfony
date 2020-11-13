<?php

namespace App\Repository;

use App\Entity\PersonPlace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonPlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonPlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonPlace[]    findAll()
 * @method PersonPlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonPlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonPlace::class);
    }

    // /**
    //  * @return PersonPlace[] Returns an array of PersonPlace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonPlace
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
