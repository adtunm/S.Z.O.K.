<?php
/**
 * Created by PhpStorm.
 * User: gnowa
 * Date: 28.10.2018
 * Time: 17:33
 */

namespace App\Repository;


use App\Entity\Promocje;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bridge\Doctrine\RegistryInterface;


class PromocjeRepository extends ServiceEntityRepository
{

    /**
     * PromocjeRepository constructor.
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Promocje::class);
    }

    public function findActual($page = 1, $pageLimit = 10)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.koniecpromocji >= :currentDate')
            ->setParameter('currentDate', date("Y-m-d"))
            ->orderBy('p.poczatekpromocji', 'ASC')
            ->getQuery();

        $requestedPage = new Paginator($query);

        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }

    public function getPageCountOfActual($pageLimit = 10)
    {
        $query = $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->andWhere('p.koniecpromocji >= :currentDate')
            ->setParameter('currentDate', date("Y-m-d"))
            ->orderBy('p.poczatekpromocji', 'ASC')
            ->getQuery();

        $count = $query->getSingleScalarResult();

        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if($rest != 0) {
            $pageCount = $pageCount + 1;
        }

        return $pageCount;
    }

    public function findOld($page = 1, $pageLimit = 10)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.koniecpromocji < :currentDate')
            ->setParameter('currentDate', date("Y-m-d"))
            ->orderBy('p.poczatekpromocji', 'ASC')
            ->getQuery();

        $requestedPage = new Paginator($query);

        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }

    public function getPageCountOfOld($pageLimit = 10)
    {
        $query = $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->andWhere('p.koniecpromocji < :currentDate')
            ->setParameter('currentDate', date("Y-m-d"))
            ->orderBy('p.poczatekpromocji', 'ASC')
            ->getQuery();

        $count = $query->getSingleScalarResult();

        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if($rest != 0) {
            $pageCount = $pageCount + 1;
        }

        return $pageCount;
    }

    public function findCurrent()
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.koniecpromocji >= :currentDate AND p.poczatekpromocji <= :currentDate')
            ->setParameter('currentDate', date("Y-m-d"))
            ->orderBy('p.poczatekpromocji', 'ASC')
            ->getQuery();

        return $query->execute();
    }

    public function getPromotionToCheck($promotionId)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.koniecpromocji >= :currentDate AND p.poczatekpromocji <= :currentDate')
            ->andWhere('p.id == :promotionId')
            ->setParameter('promotionId', $promotionId)
            ->setParameter('currentDate', date("Y-m-d"))
            ->getQuery();

        return $query->execute();
    }
}