<?php

namespace App\Repository;

use App\Entity\Sandal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sandal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sandal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sandal[]    findAll()
 * @method Sandal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SandalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sandal::class);
    }

    // /**
    //  * @return Sandal[] Returns an array of Sandal objects
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
    public function findOneBySomeField($value): ?Sandal
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
