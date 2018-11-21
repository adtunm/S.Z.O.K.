<?php
/**
 * Created by PhpStorm.
 * User: gnowa
 * Date: 18.11.2018
 * Time: 14:04
 */

namespace App\Repository;

use App\Entity\Filmy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bridge\Doctrine\RegistryInterface;

class FilmyRepository extends ServiceEntityRepository
{

    /**
     * FilmyRepository constructor.
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Filmy::class);
    }

    public function findPage($page = 1, $pageLimit = 10)
    {
        $query = $this->createQueryBuilder('f')
            ->orderBy('f.tytul', 'ASC')
            ->getQuery();

        $requestedPage = new Paginator($query);

        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }

    public function getPageCount($pageLimit = 10)
    {
        $query = $this->createQueryBuilder('f')
            ->select('count(f.id)')
            ->orderBy('f.tytul', 'ASC')
            ->getQuery();

        $count = $query->getSingleScalarResult();

        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if($rest != 0) {
            $pageCount = $pageCount + 1;
        }

        return $pageCount;
    }
}