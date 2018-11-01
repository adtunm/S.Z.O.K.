<?php
/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 29.10.2018
 * Time: 21:21
 */

namespace App\Repository;


use App\Entity\Pracownicy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bridge\Doctrine\RegistryInterface;


class PracownicyRepository extends ServiceEntityRepository
{

    /**
     * PracownicyRepository constructor.
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pracownicy::class);
    }

    public function checkEmail($email)
    {

        $query = $this->createQueryBuilder('p')
            ->where('p.email = :email')
            ->setParameter('email', $email)
            ->getQuery();

        if (count($query->execute()) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function checkTelefon($telefon)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.telefon LIKE :telefon')
            ->setParameter('telefon', $telefon)
            ->getQuery();
        if (count($query->execute()) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function checkLogin($login)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.login LIKE :login')
            ->setParameter('login', $login)
            ->getQuery();
        if (count($query->execute()) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getPageCountOfActual($pageLimit = 10)
    {
        $query = $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->andWhere('p.czyaktywny IS NULL')
            ->orderBy('p.id', 'ASC')
            ->getQuery();

        $count = $query->getSingleScalarResult();

        $pageCount = floor($count / $pageLimit);
        $rest = $count % $pageLimit;
        if($rest != 0) {
            $pageCount = $pageCount + 1;
        }

        return $pageCount;
    }

    public function findActual($page = 1, $pageLimit = 10)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.czyaktywny IS NULL')
            ->orderBy('p.id', 'ASC')
            ->getQuery();

        $requestedPage = new Paginator($query);

        $requestedPage->getQuery()
            ->setFirstResult($pageLimit * ($page - 1))
            ->setMaxResults($pageLimit);

        return $requestedPage;
    }

}
