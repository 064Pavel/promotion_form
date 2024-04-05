<?php

namespace App\Repository;

use App\Entity\GeneralPromoCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GeneralPromoCode>
 *
 * @method GeneralPromoCode|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeneralPromoCode|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeneralPromoCode[]    findAll()
 * @method GeneralPromoCode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeneralPromoCodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeneralPromoCode::class);
    }

    //    /**
    //     * @return GeneralPromoCode[] Returns an array of GeneralPromoCode objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?GeneralPromoCode
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
