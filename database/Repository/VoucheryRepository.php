<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 17.11.2018
 * Time: 18:29
 */

namespace App\Repository;

use App\Entity\Vouchery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class VoucheryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vouchery::class);
    }

    public function findVoucherByCode(string $code)
    {
        if(strlen($code) < 28 or !Vouchery::verifyCode($code)) return NULL;
        $id = substr($code, 18, -1);
        return $this->find($id);
    }

}