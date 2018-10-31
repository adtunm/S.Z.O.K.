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

}
