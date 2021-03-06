<?php

namespace App\Repository;

use App\Entity\MatchTennis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MatchTennis|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatchTennis|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatchTennis[]    findAll()
 * @method MatchTennis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchTennisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatchTennis::class);
    }

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

    // /**
    //  * @return MatchTennis[] Returns an array of MatchTennis objects
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
    public function findOneBySomeField($value): ?MatchTennis
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
