<?php

namespace App\Repository;

use App\Entity\Alternative;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Alternative|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alternative|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alternative[]    findAll()
 * @method Alternative[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlternativeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Alternative::class);
    }

    // /**
    //  * @return Alternative[] Returns an array of Alternative objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Alternative
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
