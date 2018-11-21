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
            ->where('m.rzedy = '.$rowId)
            ->orderBy('m.pozycja', 'ASC')
            ->getQuery();

        return $query->execute();
    }

    public function deleteSeat($rowId)
    {
        $query = $this->createQueryBuilder('m')
            ->delete()
            ->where('m.rzedy = '.$rowId)
            ->getQuery();

        $query->execute();
    }

    public function getSeatsCount($page = 1, $pageLimit = 10){
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

    public function getSeatsCountOfCurrent($roomId){
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
}