<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 29.11.2018
 * Time: 20:54
 */

namespace App\Repository;


use App\Entity\Pulebiletow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class PulebiletowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pulebiletow::class);
    }

    public function getSeancesTickets($id)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT DISTINCT
                pbmrb.id,
                pbmrb.cena,
                rb.nazwa
            FROM App\Entity\Pulebiletow pb
            JOIN pb.seanse se
            JOIN pb.pulabiletowmarodzajebiletow pbmrb
            JOIN pbmrb.rodzajebiletow rb
            WHERE se.id = :id')
            ->setParameter('id', $id);

        return $query->execute();
    }

    public function getTicketToCheck($id, $ticketId)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT DISTINCT
                pbmrb.id
            FROM App\Entity\Pulebiletow pb
            JOIN pb.seanse se
            JOIN pb.pulabiletowmarodzajebiletow pbmrb
            JOIN pbmrb.rodzajebiletow rb
            WHERE se.id = :id
            AND pbmrb.id = :ticketId')
            ->setParameter('id', $id)
            ->setParameter('ticketId', $ticketId);

        return $query->execute();
    }
}