<?php

namespace App\Repository\Main;

use App\Entity\Main\DealerInvoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DealerInvoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method DealerInvoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method DealerInvoice[]    findAll()
 * @method DealerInvoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DealerInvoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DealerInvoice::class);
    }

    // /**
    //  * @return DealerInvoice[] Returns an array of DealerInvoice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DealerInvoice
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
