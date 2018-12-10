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

    public function getReservations($page = 1, $pageLimit = 10, $id = '%', $date = '%', $name = '%', $surname = '%')
    {

        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT
                r.id,
                r.imie,
                r.nazwisko,
                CONCAT_WS(\' - \', f.tytul, tse.nazwa, DATE_FORMAT(se.poczatekseansu, \'%H:%i\')) AS seans
            FROM App\Entity\Rezerwacje r
            JOIN r.seanse se
            JOIN App\Entity\SeansMaFilmy smf
            JOIN smf.filmy f
            JOIN se.typyseansow tse
            WHERE smf.seanse = se.id
            AND DATE_FORMAT(se.poczatekseansu, \'%d.%m.%Y\') LIKE :date
            AND r.imie LIKE :name
            AND r.nazwisko LIKE :surname
            AND r.id LIKE :id
            ORDER BY r.id')
            ->setParameter('name', $name)
            ->setParameter('surname', $surname)
            ->setParameter('date', $date)
            ->setParameter('id', $id)
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $query->execute();
    }

    public function getPageCount($pageLimit = 10, $id = '%', $date = '%', $name = '%', $surname = '%')
    {
        $query = $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->join('r.seanse', 'se')
            ->join('App\Entity\SeansMaFilmy', 'smf')
            ->where('smf.seanse = se.id',
                'DATE_FORMAT(se.poczatekseansu, \'%d.%m.%Y\') LIKE :date',
                'r.imie LIKE :name',
                'r.nazwisko LIKE :surname',
                'r.id LIKE :id')
            ->setParameter('surname', $surname)
            ->setParameter('name', $name)
            ->setParameter('date', $date)
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