<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tranzakcje
 *
 * @ORM\Table(name="tranzakcje", uniqueConstraints={@ORM\UniqueConstraint(name="idTranzakcje_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Tranzakcje_RodzajePlatnosci1_idx", columns={"RodzajePlatnosci_id"}), @ORM\Index(name="fk_Tranzakcje_Uzytkownicy1_idx", columns={"Uzytkownicy_id"}), @ORM\Index(name="fk_Tranzakcje_Pracownicy1_idx", columns={"Pracownicy_id"}), @ORM\Index(name="fk_Tranzakcje_Promocje1_idx", columns={"Promocje_id"}), @ORM\Index(name="fk_Tranzakcje_Seanse1_idx", columns={"Seanse_id"})})
 * @ORM\Entity
 */
class Tranzakcje
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
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var int
     *
     * @ORM\Column(name="czyOdwiedzajacy", type="integer", nullable=false)
     */
    private $czyodwiedzajacy;

    /**
     * @var \Pracownicy
     *
     * @ORM\ManyToOne(targetEntity="Pracownicy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Pracownicy_id", referencedColumnName="id")
     * })
     */
    private $pracownicy;

    /**
     * @var \Promocje
     *
     * @ORM\ManyToOne(targetEntity="Promocje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Promocje_id", referencedColumnName="id")
     * })
     */
    private $promocje;

    /**
     * @var \Rodzajeplatnosci
     *
     * @ORM\ManyToOne(targetEntity="Rodzajeplatnosci")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RodzajePlatnosci_id", referencedColumnName="id")
     * })
     */
    private $rodzajeplatnosci;

    /**
     * @var \Seanse
     *
     * @ORM\ManyToOne(targetEntity="Seanse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Seanse_id", referencedColumnName="id")
     * })
     */
    private $seanse;

    /**
     * @var \Uzytkownicy
     *
     * @ORM\ManyToOne(targetEntity="Uzytkownicy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Uzytkownicy_id", referencedColumnName="id")
     * })
     */
    private $uzytkownicy;


}
