<?php
/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 20.11.2018
 * Time: 14:25
 */

namespace App\Repository;

use App\Entity\PulabiletowMaRodzajebiletow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;


class PulabiletowMaRodzajebiletowRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PulabiletowMaRodzajebiletow::class);
    }

    public function getBilety($id)
    {
        $query = $this->createQueryBuilder('pmr')
            ->select('pmr.id, pmr.cena')
           // ->leftJoin('pmr.pulebiletow', 'p')
            ->andWhere('pmr.id LIKE :id'  )
            ->setParameter('id', $id)
            ->getQuery();

        return $query->getArrayResult();
    }

}