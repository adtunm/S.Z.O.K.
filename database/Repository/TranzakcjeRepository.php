<?php
/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 05.12.2018
 * Time: 01:16
 */

namespace App\Repository;


use App\Entity\Tranzakcje;
use App\Entity\Uzytkownicy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TranzakcjeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tranzakcje::class);
    }

    public function getClientTransactionsPage(Uzytkownicy $user, $page = 1, $pageLimit = 5)
    {
        $query = $this->createQueryBuilder('t')
            ->andWhere('t.uzytkownicy = :user')
            ->setParameter('user', $user)
            ->orderBy('t.id', 'DESC')
            ->getQuery();

        $requestedPage = new Paginator($query);
        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }

    public function getClientTransactionsPageCount(Uzytkownicy $user, $pageLimit = 5)
    {
        $query = $this->createQueryBuilder('t')
            ->select('count(t.id)')
            ->andWhere('t.uzytkownicy = :user')
            ->setParameter('user', $user)
            ->getQuery();

        $count = $query->getSingleScalarResult();
        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if ($rest != 0) {
            $pageCount = $pageCount + 1;
        }
        return $pageCount;
    }

    public function getForClientTransactionsPage(Uzytkownicy $user, $dateFrom, $dateTo, $page = 1, $pageLimit = 10)
    {
        if($dateFrom == null or !\DateTime::createFromFormat('Y-m-d', $dateFrom)){
            $from = new \DateTime("1000-01-01 00:00:00");
        } else {
            $from = new \DateTime($dateFrom . " 00:00:00");
        }

        if($dateTo == null or !\DateTime::createFromFormat('Y-m-d', $dateTo)){
            $to = new \DateTime("9999-12-31 23:59:59");
        } else {
            $to = new \DateTime($dateTo . " 23:59:59");
        }

        $query = $this->createQueryBuilder('t')
            ->andWhere('t.uzytkownicy = :user')
            ->andWhere('t.data BETWEEN :dateF AND :dateT')
            ->setParameter('user', $user)
            ->setParameter('dateF', $from)
            ->setParameter('dateT', $to)
            ->orderBy('t.id', 'DESC')
            ->getQuery();

        $requestedPage = new Paginator($query);
        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }

    public function getForClientTransactionsPageCount(Uzytkownicy $user, $dateFrom, $dateTo, $pageLimit = 10)
    {
        if($dateFrom == null or !\DateTime::createFromFormat('Y-m-d', $dateFrom)){
            $from = new \DateTime("1000-01-01 00:00:00");
        } else {
            $from = new \DateTime($dateFrom . " 00:00:00");
        }

        if($dateTo == null or !\DateTime::createFromFormat('Y-m-d', $dateTo)){
            $to = new \DateTime("9999-12-31 23:59:59");
        } else {
            $to = new \DateTime($dateTo . " 23:59:59");
        }

        $query = $this->createQueryBuilder('t')
            ->select('count(t.id)')
            ->andWhere('t.uzytkownicy = :user')
            ->andWhere('t.data BETWEEN :dateF AND :dateT')
            ->setParameter('dateF', $from)
            ->setParameter('dateT', $to)
            ->setParameter('user', $user)
            ->getQuery();

        $count = $query->getSingleScalarResult();
        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if ($rest != 0) {
            $pageCount = $pageCount + 1;
        }
        return $pageCount;
    }
}