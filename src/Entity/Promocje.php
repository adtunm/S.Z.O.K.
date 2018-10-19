<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promocje
 *
 * @ORM\Table(name="promocje", uniqueConstraints={@ORM\UniqueConstraint(name="idPromocje_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Promocje
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
     * @ORM\Column(name="nazwa", type="string", length=45, nullable=false)
     */
    private $nazwa;

    /**
     * @var bool
     *
     * @ORM\Column(name="czyKwotowa", type="boolean", nullable=false)
     */
    private $czykwotowa;

    /**
     * @var string
     *
     * @ORM\Column(name="wartosc", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $wartosc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="poczatekPromocji", type="date", nullable=false)
     */
    private $poczatekpromocji;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="koniecPromocji", type="date", nullable=false)
     */
    private $koniecpromocji;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="czyKobieta", type="boolean", nullable=true)
     */
    private $czykobieta;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="staz", type="date", nullable=true)
     */
    private $staz;


}
