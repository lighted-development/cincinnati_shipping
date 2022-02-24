<?php

namespace App\Repository\CustomerService;

use App\Entity\CustomerService\ServiceCallLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceCallLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceCallLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceCallLog[]    findAll()
 * @method ServiceCallLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceCallLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceCallLog::class);
    }

    public function findIds(){
        $qb = $this->_em->createQueryBuilder();
        $qb->select('serviceCallLog.id')
            ->from(ServiceCallLog::class, 'serviceCallLog')
        ;

        return array_column($qb->getQuery()->getResult(), 'id');
    }

    // /**
    //  * @return ServiceCallLog[] Returns an array of ServiceCallLog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiceCallLog
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
