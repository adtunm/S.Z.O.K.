<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 21.11.2018
 * Time: 12:49
 */

namespace App\Repository;


use App\Entity\Rezerwacje;
use App\Entity\Seanse;
use App\Entity\Uzytkownicy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

class RezerwacjeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rezerwacje::class);
    }

    public function getReservations($id, $date, $name, $surname, $page = 1, $pageLimit = 10){

        if($id == null){
            $id = '%';
        }
        if($date == null or !\DateTime::createFromFormat('Y-m-d', $date)){
            $from = new \DateTime("1000-01-01 00:00:00");
            $to = new \DateTime("9999-12-31 23:59:59");
        } else {
            $from = new \DateTime($date . " 00:00:00");
            $to = new \DateTime($date . " 23:59:59");
        }

        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT r
            FROM App\Entity\Rezerwacje r
            JOIN r.seanse se
            JOIN se.seansMaFilmy smf
            JOIN smf.filmy f
            JOIN se.typyseansow tse
            WHERE se.poczatekseansu BETWEEN :dateF AND :dateT
            AND (INSTR(r.imie, :name) > 0 OR :name IS NULL)
            AND (INSTR(r.nazwisko, :surname) > 0 OR :surname IS NULL)
            AND r.id LIKE :id
            AND r.sfinalizowana != 1
            GROUP BY r.id
            ORDER BY r.id')
            ->setParameter('name', $name)
            ->setParameter('surname', $surname)
            ->setParameter('dateF', $from)
            ->setParameter('dateT', $to)
            ->setParameter('id', $id)
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $query->execute();
    }

    public function getPageCount($id, $date, $name, $surname, $pageLimit = 10)
    {
        if($id == null){
            $id = '%';
        }
        if($date == null or !\DateTime::createFromFormat('Y-m-d', $date) ){
            $from = new \DateTime("1000-01-01 00:00:00");
            $to = new \DateTime("9999-12-31 23:59:59");
        } else {
            $from = new \DateTime($date . " 00:00:00");
            $to = new \DateTime($date . " 23:59:59");
        }


        $query = $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->join('r.seanse', 'se')
            ->join('App\Entity\SeansMaFilmy', 'smf')
            ->where('smf.seanse = se.id',
                'se.poczatekseansu BETWEEN :dateF AND :dateT',
                '(INSTR(r.imie, :name) > 0 OR :name IS NULL)',
                '(INSTR(r.nazwisko, :surname) > 0 OR :surname IS NULL)',
                'r.id LIKE :id',
                'r.sfinalizowana != 1')
            ->setParameter('name', $name)
            ->setParameter('surname', $surname)
            ->setParameter('dateF', $from)
            ->setParameter('dateT', $to)
            ->setParameter('id', $id)
            ->orderBy('r.id', 'ASC')
            ->getQuery();

        $count = $query->getSingleScalarResult();

        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if ($rest != 0) {
            $pageCount = $pageCount + 1;
        }

        return $pageCount;
    }

    public function findBookingNotFinalized(Seanse $seance)
    {
        $query = $this->createQueryBuilder('r')
            ->select('r')
            ->andWhere('r.sfinalizowana = false')
            ->andWhere('r.seanse = :seance')
            ->setParameter('seance', $seance)
            ->getQuery();
        return $query->execute();
    }

    public function getClientReservationsPage(Uzytkownicy $user, $page = 1, $pageLimit = 5)
    {
        $query = $this->createQueryBuilder('r')
            ->andWhere('r.uzytkownicy = :user')
            ->setParameter('user', $user)
            ->orderBy('r.id', 'DESC')
            ->getQuery();

        $requestedPage = new Paginator($query);
        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }

    public function getClientReservationsPageCount(Uzytkownicy $user, $pageLimit = 5)
    {
        $query = $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->andWhere('r.uzytkownicy = :user')
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