<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 11.11.2018
 * Time: 12:40
 */

namespace App\Repository;


use App\Entity\Miejsca;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MiejscaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Miejsca::class);
    }

    public function getSeats($rowId)
    {
        $query = $this->createQueryBuilder('m')
            ->where('m.rzedy = ' . $rowId)
            ->orderBy('m.pozycja', 'ASC')
            ->getQuery();

        return $query->execute();
    }

    public function deleteSeat($rowId)
    {
        $query = $this->createQueryBuilder('m')
            ->delete()
            ->where('m.rzedy = ' . $rowId)
            ->getQuery();

        $query->execute();
    }

    public function getSeatsCount($page = 1, $pageLimit = 10)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT COUNT(m.id)
            AS liczba
            FROM App\Entity\Miejsca m
            JOIN m.rzedy r
            JOIN r.sale s
            WHERE m.numermiejsca != 0
            GROUP BY s.id
            ORDER BY s.numersali ASC'
        )->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $query->execute();
    }

    public function getSeatsCountOfCurrent($roomId)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT COUNT(m.id)
            AS liczba
            FROM App\Entity\Miejsca m
            JOIN m.rzedy r
            JOIN r.sale s
            WHERE m.numermiejsca != 0
            AND s.id = :id'
        )->setParameter('id', $roomId);

        return $query->getSingleScalarResult();
    }

    public function getRoom($id, $idSeance)
    {
        $entityManager = $this->getEntityManager();
//        $query = $entityManager->createQuery(
//            'SELECT m
//            FROM App\Entity\Miejsca m
//            JOIN m.rzedy r
//            JOIN r.sale s
//            LEFT JOIN m.rezerwacje re
//            LEFT JOIN m.bilety b
//            JOIN b.tranzakcje t
//            WHERE s.id = :id
//                AND m.rezerwacje is NULL AND re.seanse = :idSeance
//                AND m.bilety is NULL AND t.seanse = :idSeance
//            GROUP BY m.id
//            ORDER BY r.numerrzedu, m.pozycja')
//            ->setParameter('id', $id)
//            ->setParameter('idSeance', $idSeance);



        $query = $this->createQueryBuilder('m')
            ->select('COUNT(DISTINCT m.id)')
            ->join('m.rzedy','r')
            ->join('r.sale','s')
            ->leftJoin('m.rezerwacje', 're')
            ->leftJoin('re.seanse', 'se')
            //->leftJoin('m.bilety', 'b')
            //->leftjoin('b.tranzakcje','t')
            ->andWhere('s.id = :id')
            ->andWhere('re.id IS NULL OR se.id = :idSeance')
            //->andWhere('b.id IS NULL OR t.seanse = :idSeance')
            ->setParameter('id', $id)
            ->setParameter('idSeance', 10)
            ->orderBy('r.numerrzedu, m.pozycja', 'DESC')
            ->getQuery();









        $query->execute();



//        $entityManager = $this->getEntityManager();
//        $query = $entityManager->createQuery(
//            'SELECT r
//            FROM App\Entity\Miejsca m
//            JOIN m.rzedy r
//            JOIN r.sale s
//            LEFT JOIN m.rezerwacje re
//            WHERE s.id = :id  AND re.seanse = :idSeance
//            GROUP BY m.id
//            ORDER BY r.numerrzedu, m.pozycja')
//            ->setParameter('id', $id)
//            ->setParameter('idSeance', $idSeance);
//
//        $query->execute();

//        $query = $entityManager->createQuery(
//            'SELECT m.id AS miejsce, b.id AS bilet
//            FROM App\Entity\Bilety b
//            LEFT JOIN b.miejsca m
//            WITH b.miejsca = m.id
//            ');


        return $query->execute();
    }
}