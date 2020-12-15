<?php

namespace App\Repository;

use App\Entity\TourneyPlay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TourneyPlay|null find($id, $lockMode = null, $lockVersion = null)
 * @method TourneyPlay|null findOneBy(array $criteria, array $orderBy = null)
 * @method TourneyPlay[]    findAll()
 * @method TourneyPlay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TourneyPlayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TourneyPlay::class);
    }

    // /**
    //  * @return TourneyPlay[] Returns an array of TourneyPlay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TourneyPlay
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

	public function findByWithParam($param)
	{
		$desc = 'ASC';
		if($param['desc']){$desc ='DESC';}

		return $this->createQueryBuilder('p')
			->setMaxResults($param['limit'])
			->setFirstResult($param['offset'])
			->orderBy('p.'.$param['orderBy'], $desc)
			->getQuery()
			->getResult()
			;
	}
}
