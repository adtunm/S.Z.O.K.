<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 17.11.2018
 * Time: 18:29
 */

namespace App\Repository;

use App\Entity\SeansMaFilmy;
use App\Entity\Bilety;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class BiletyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bilety::class);
    }

    public function getTickets($id){

        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT 
                f.tytul, 
                f.czastrwania,
                DATE_FORMAT(se.poczatekseansu, \'%d.%m.%Y\') AS data,
                DATE_FORMAT(se.poczatekseansu, \'%H:%i\') AS godzina,
                m.numermiejsca,
                r.numerrzedu,
                sa.numersali,
                b.cena,
                CONCAT_WS( \'\', LPAD(t.id, 12, 0), b.losowecyfry, LPAD(m.id, 5, 0), b.cyfrakontrolna) AS kodbiletu,
                rb.nazwa
            FROM App\Entity\Bilety b
            JOIN b.rodzajebiletow rb
            JOIN b.miejsca m
            JOIN m.rzedy r
            JOIN r.sale sa
            JOIN b.tranzakcje t
            JOIN t.seanse se
            JOIN App\Entity\SeansMaFilmy smf
            JOIN smf.filmy f
            WHERE t.id = :id
            AND smf.seanse = se.id')
        ->setParameter('id', $id);



        return $query->execute();
    }

}