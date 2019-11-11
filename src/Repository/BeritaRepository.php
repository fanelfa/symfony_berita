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

    public function findAllBerita(){
        return $this->createQueryBuilder('b')
            ->andWhere('b.soft_delete = :val')
            ->setParameter('val', 'false')
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findOneBySlug($slug){
        return $this->createQueryBuilder('b')
            ->andWhere('b.slug = :val')
            ->setParameter('val', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findBySlug($slug){
        return $this->createQueryBuilder('b')
            ->select('b.slug')
            ->andWhere('b.slug LIKE :val')
            ->setParameter('val', $slug.'%')
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByKategori($kate_id, $berita_id)
    {
        return $this->createQueryBuilder('b')
            ->select('b')
            ->andWhere('b.kategori = :val')
            ->andWhere("b.id != ".$berita_id)
            ->setParameter('val', $kate_id)
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
