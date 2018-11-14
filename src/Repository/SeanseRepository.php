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

}