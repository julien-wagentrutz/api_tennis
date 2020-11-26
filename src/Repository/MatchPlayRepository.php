<?php

namespace App\Repository;

use App\Entity\MatchPlay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MatchPlay|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatchPlay|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatchPlay[]    findAll()
 * @method MatchPlay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchPlayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatchPlay::class);
    }

    // /**
    //  * @return MatchPlay[] Returns an array of MatchPlay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MatchPlay
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
