<?php

namespace App\Repository;

use App\Entity\Berita;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Berita|null find($id, $lockMode = null, $lockVersion = null)
 * @method Berita|null findOneBy(array $criteria, array $orderBy = null)
 * @method Berita[]    findAll()
 * @method Berita[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeritaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Berita::class);
    }

    // /**
    //  * @return Berita[] Returns an array of Berita objects
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
    public function findOneBySomeField($value): ?Berita
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findBeritaAll(){
        $qb = $this->createQueryBuilder('b')
            ->andWhere('b.soft_delete = :f')
            ->orderBy('b.id', 'DESC')
            ->getQuery();
            
        return $qb->execute();
    }
}
