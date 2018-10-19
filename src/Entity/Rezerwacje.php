<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rezerwacje
 *
 * @ORM\Table(name="rezerwacje", uniqueConstraints={@ORM\UniqueConstraint(name="idRezerwacje_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Rezerwacje_Uzytkownicy1_idx", columns={"Uzytkownicy_id"}), @ORM\Index(name="fk_Rezerwacje_Pracownicy1_idx", columns={"Pracownicy_id"}), @ORM\Index(name="fk_Rezerwacje_Seanse1_idx", columns={"Seanse_id"})})
 * @ORM\Entity
 */
class Rezerwacje
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
     * @ORM\Column(name="imie", type="string", length=45, nullable=false)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwisko", type="string", length=45, nullable=false)
     */
    private $nazwisko;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=9, nullable=false)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(name="czyOdwiedzajacy", type="boolean", nullable=false)
     */
    private $czyodwiedzajacy;

    /**
     * @var bool
     *
     * @ORM\Column(name="sfinalizowana", type="boolean", nullable=false)
     */
    private $sfinalizowana;

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

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Miejsca", inversedBy="rezerwacje")
     * @ORM\JoinTable(name="rezerwacja_ma_miejsca",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Rezerwacje_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Miejsca_id", referencedColumnName="id")
     *   }
     * )
     */
    private $miejsca;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->miejsca = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
