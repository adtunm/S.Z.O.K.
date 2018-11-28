<?php
/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 20.11.2018
 * Time: 02:05
 */

namespace App\Repository;


use App\Entity\Pulebiletow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

class PuleBiletowRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pulebiletow::class);
    }

    public function getPageCountOfActive($pageLimit = 10)
    {
        $query = $this->createQueryBuilder('d')
            ->select('count(d.id)')
            ->andWhere('d.usunieto IS NULL')
            ->orderBy('d.id', 'ASC')
            ->getQuery();

        $count = $query->getSingleScalarResult();
        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if($rest != 0) {
            $pageCount = $pageCount + 1;
        }
        return $pageCount;
    }

    public function findActive($page = 1, $pageLimit = 10)
    {
        $query = $this->createQueryBuilder('d')
            ->andWhere('d.usunieto IS NULL')
            ->orderBy('d.id', 'ASC')
            ->getQuery();

        $requestedPage = new Paginator($query);
        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }
    public function getPageCountOfDeleted($pageLimit = 10)
    {
        $query = $this->createQueryBuilder('d')
            ->select('count(d.id)')
            ->andWhere('d.usunieto = 0')
            ->orderBy('d.id', 'ASC')
            ->getQuery();

        $count = $query->getSingleScalarResult();
        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if($rest != 0) {
            $pageCount = $pageCount + 1;
        }
        return $pageCount;
    }

    public function findDeleted($page = 1, $pageLimit = 10)
    {
        $query = $this->createQueryBuilder('d')
            ->andWhere('d.usunieto = 0')
            ->orderBy('d.id', 'ASC')
            ->getQuery();

        $requestedPage = new Paginator($query);
        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }

    public function findPools()
    {
//        $query = $this->createQueryBuilder('p')
//            ->from('App\Entity\PulabiletowMaRodzajebiletow', 'pmr')
//            ->from('App\Entity\Rodzajebiletow', 'r')
//            ->where('pmr.PuleBiletow_id LIKE p.id')
//            ->andWhere( 'pmr.RodzajeBiletow_id LIKE r.id')
//            ->andWhere('p.id LIKE 1')
//            ->getQuery()
//            ->getSingleScalarResult();
//        return $query;

        $query = $this->getEntityManager()
        ->createQuery('SELECT r.nazwa, pmr.cena  
                FROM pulabiletow_ma_rodzajebiletow pmr, pulebiletow p, rodzajebiletow r
                WHERE pmr.PuleBiletow_id LIKE p.id
                AND   pmr.RodzajeBiletow_id LIKE r.id
                AND p.id LIKE 1');
    }
}