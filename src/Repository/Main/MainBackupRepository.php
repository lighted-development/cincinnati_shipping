<?php

namespace App\Repository\Main;

use App\Entity\Main\MainBackup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MainBackup|null find($id, $lockMode = null, $lockVersion = null)
 * @method MainBackup|null findOneBy(array $criteria, array $orderBy = null)
 * @method MainBackup[]    findAll()
 * @method MainBackup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MainBackupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MainBackup::class);
    }

    // /**
    //  * @return MainBackup[] Returns an array of MainBackup objects
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
    public function findOneBySomeField($value): ?MainBackup
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
