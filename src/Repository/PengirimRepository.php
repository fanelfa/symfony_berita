<?php

namespace App\Repository;

use App\Entity\Pengirim;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Pengirim|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pengirim|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pengirim[]    findAll()
 * @method Pengirim[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PengirimRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pengirim::class);
    }

    // /**
    //  * @return Pengirim[] Returns an array of Pengirim objects
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
    public function findOneBySomeField($value): ?Pengirim
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
