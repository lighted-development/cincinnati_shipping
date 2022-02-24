<?php

namespace App\Repository\Main;

use App\Entity\Main\BatchControlLtl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BatchControlLtl|null find($id, $lockMode = null, $lockVersion = null)
 * @method BatchControlLtl|null findOneBy(array $criteria, array $orderBy = null)
 * @method BatchControlLtl[]    findAll()
 * @method BatchControlLtl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BatchControlLtlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BatchControlLtl::class);
    }

    // /**
    //  * @return BatchControlLtl[] Returns an array of BatchControlLtl objects
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
    public function findOneBySomeField($value): ?BatchControlLtl
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
