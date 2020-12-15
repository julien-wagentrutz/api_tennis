<?php

namespace App\Repository;

use App\Entity\Tourney;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tourney|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tourney|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tourney[]    findAll()
 * @method Tourney[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TourneyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tourney::class);
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
    //  * @return Tourney[] Returns an array of Tourney objects
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


}
