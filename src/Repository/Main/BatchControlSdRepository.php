<?php

namespace App\Repository\Main;

use App\Entity\Main\BatchControlSd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BatchControlSd|null find($id, $lockMode = null, $lockVersion = null)
 * @method BatchControlSd|null findOneBy(array $criteria, array $orderBy = null)
 * @method BatchControlSd[]    findAll()
 * @method BatchControlSd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BatchControlSdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BatchControlSd::class);
    }

    // /**
    //  * @return BatchControlSd[] Returns an array of BatchControlSd objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BatchControlSd
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
