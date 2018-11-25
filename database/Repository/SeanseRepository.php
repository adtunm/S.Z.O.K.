<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 13.11.2018
 * Time: 14:51
 */

namespace App\Repository;

use App\Entity\Seanse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SeanseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Seanse::class);
    }

    public function checkSeancesForRooms($rooms)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT DISTINCT sa.id
            AS seanse
            FROM App\Entity\Seanse se
            JOIN se.sale sa
            GROUP BY sa.id
            ORDER BY sa.numersali ASC'
        );
        $roomsInSeances =  $query->execute();
        $checkRooms = array();
        foreach($rooms as $key => $room){
            $checkRooms[$key] = !in_array(array('seanse' => $room->getId()), $roomsInSeances);
        }
        return $checkRooms;
    }

    public function getSeance($id)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT DISTINCT
                se.id,
                f.tytul, 
                DATE_FORMAT(se.poczatekseansu, \'%d.%m.%Y\') AS data,
                DATE_FORMAT(se.poczatekseansu, \'%H:%i\') AS godzina,
                sa.id AS salaid,
                sa.numersali,
                ts.nazwa
            FROM App\Entity\Seanse se
            JOIN se.sale sa
            JOIN se.typyseansow ts
            JOIN App\Entity\SeansMaFilmy smf
            JOIN smf.filmy f
            WHERE se.id = :id AND smf.seanse = se.id')
        ->setParameter('id', $id);

        return $query->execute();
    }

    public function findSeancesForMovie(\App\Entity\Filmy $movie, $date, $page = 1, $pageLimit = 5){
        $from = new \DateTime($date." 00:00:00");
        $to   = new \DateTime($date." 23:59:59");

        $query = $this->createQueryBuilder('s')
            ->select('s')
            ->join('s.seansMaFilmy', 'smf')
            ->andWhere('smf.filmy = :movie')
            ->andWhere('s.poczatekseansu BETWEEN :from AND :to')
            ->setParameter('movie', $movie)
            ->setParameter('from', $from )
            ->setParameter('to', $to)
            ->getQuery();

        $requestedPage = new Paginator($query);

        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }

    public function getPageCountForMovie(\App\Entity\Filmy $movie, $date, $pageLimit = 5){
        $from = new \DateTime($date." 00:00:00");
        $to   = new \DateTime($date." 23:59:59");

        $query = $this->createQueryBuilder('s')
            ->select('count(s.id)')
            ->join('s.seansMaFilmy', 'smf')
            ->andWhere('smf.filmy = :movie')
            ->andWhere('s.poczatekseansu BETWEEN :from AND :to')
            ->setParameter('movie', $movie)
            ->setParameter('from', $from )
            ->setParameter('to', $to)
            ->getQuery();

        $count = $query->getSingleScalarResult();

        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if($rest != 0) {
            $pageCount = $pageCount + 1;
        }

        return $pageCount;
    }

    public function checkSeancesForMovie(\App\Entity\Filmy $movie){

        $query = $this->createQueryBuilder('s')
            ->select('count(s.id)')
            ->join('s.seansMaFilmy', 'smf')
            ->andWhere('smf.filmy = :movie')
            ->setParameter('movie', $movie)
            ->getQuery();

        $count = $query->getSingleScalarResult();

        if($count>0) return false;
        else return true;
    }
}