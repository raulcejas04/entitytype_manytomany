<?php

namespace App\Repository;

use App\Entity\UsuDisp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuDisp|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuDisp|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuDisp[]    findAll()
 * @method UsuDisp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuDispRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuDisp::class);
    }

    public function findAllByIdUsuario($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.id_usuario = :val')
            ->setParameter('val', $value)
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    // /**
    //  * @return UsuDisp[] Returns an array of UsuDisp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsuDisp
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
