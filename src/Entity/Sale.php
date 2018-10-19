<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sale
 *
 * @ORM\Table(name="sale", uniqueConstraints={@ORM\UniqueConstraint(name="idSale_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="numerSali_UNIQUE", columns={"numerSali"})})
 * @ORM\Entity
 */
class Sale
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numerSali", type="string", length=3, nullable=false)
     */
    private $numersali;

    /**
     * @var int
     *
     * @ORM\Column(name="dlugoscSali", type="integer", nullable=false)
     */
    private $dlugoscsali;

    /**
     * @var int
     *
     * @ORM\Column(name="szerokoscSali", type="integer", nullable=false)
     */
    private $szerokoscsali;


}
