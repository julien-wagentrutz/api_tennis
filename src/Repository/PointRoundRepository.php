<?php

namespace App\Repository;

use App\Entity\PointRound;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PointRound|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointRound|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointRound[]    findAll()
 * @method PointRound[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointRoundRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PointRound::class);
    }

    // /**
    //  * @return PointRound[] Returns an array of PointRound objects
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
    public function findOneBySomeField($value): ?PointRound
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
