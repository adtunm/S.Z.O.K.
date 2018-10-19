<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vouchery
 *
 * @ORM\Table(name="vouchery", uniqueConstraints={@ORM\UniqueConstraint(name="idVouchery_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Vouchery
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
     * @var string
     *
     * @ORM\Column(name="losoweCyfry", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $losowecyfry;

    /**
     * @var string
     *
     * @ORM\Column(name="cyfraKontrolna", type="decimal", precision=1, scale=0, nullable=false)
     */
    private $cyfrakontrolna;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="czasWygenerowania", type="datetime", nullable=false)
     */
    private $czaswygenerowania;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="czyWykorzystanyy", type="boolean", nullable=true)
     */
    private $czywykorzystanyy;


}
