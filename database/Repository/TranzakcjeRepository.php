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
        if($rest != 0) {
            $pageCount = $pageCount + 1;
        }
        return $pageCount;
    }

    public function getSalesReport(array $data)
    {
        $data['from']->setTime(0, 0, 0);
        $data['to']->setTime(23, 59, 59);
        $query = $this->createQueryBuilder('t')
            ->select('DATE_FORMAT(t.data, \'%m.%Y\') AS format,
             t.data AS date,
             SUM(CASE WHEN t.pracownicy IS NOT NULL THEN b.cena ELSE 0 END) AS register,
             SUM(CASE WHEN t.pracownicy IS NULL THEN b.cena ELSE 0 END) AS internet,
             SUM(CASE WHEN p.id = 1 THEN b.cena ELSE 0 END) AS card,
             SUM(CASE WHEN p.id = 2 THEN b.cena ELSE 0 END) AS cash,
             SUM(b.cena) AS all')
            ->join('t.rodzajeplatnosci', 'p')
            ->join('t.seanse', 's')
            ->join('t.bilety', 'b')
            ->orderBy('t.data', 'ASC')
            ->groupBy('format')
            ->andWhere('t.data BETWEEN :from AND :to')
            ->setParameter('from', $data['from'])
            ->setParameter('to', $data['to']);
        if(in_array('AP', $data['where']) and $data['employee']) {
            $query->andWhere('t.pracownicy = :employee')
                ->setParameter('employee', $data['employee']);
        }
        if(count($data['where']) == 1) {
            switch($data['where'][0]) {
                case 'AP':
                    $query->andWhere('t.pracownicy IS NOT NULL');
                    break;
                case 'AK':
                    $query->andWhere('t.pracownicy IS NULL');
            }
        }
        if($data['payment'] != array()) {
            $query->andWhere('t.rodzajeplatnosci IN (:payment)')
                ->setParameter('payment', $data['payment']);
        }
        if($data['movie']) {
            $query->join('s.seansMaFilmy', 'smf')
                ->andWhere('smf.filmy = :movie')
                ->setParameter('movie', $data['movie']);
        }

        return $query->getQuery()->execute();
    }
}