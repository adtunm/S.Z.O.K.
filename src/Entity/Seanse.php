<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seanse
 *
 * @ORM\Table(name="seanse", uniqueConstraints={@ORM\UniqueConstraint(name="idSeanse_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Seanse_WydarzeniaSpecjalne1_idx", columns={"WydarzeniaSpecjalne_id"}), @ORM\Index(name="fk_Seanse_TypySeansow1_idx", columns={"TypySeansow_id"}), @ORM\Index(name="fk_Seanse_Sale1_idx", columns={"Sale_id"}), @ORM\Index(name="fk_Seanse_PuleBiletow1_idx", columns={"PuleBiletow_id"})})
 * @ORM\Entity
 */
class Seanse
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
     * @ORM\Column(name="poczatekSeansu", type="datetime", nullable=false)
     */
    private $poczatekseansu;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="czyOdwolany", type="boolean", nullable=true)
     */
    private $czyodwolany;

    /**
     * @var \Pulebiletow
     *
     * @ORM\ManyToOne(targetEntity="Pulebiletow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PuleBiletow_id", referencedColumnName="id")
     * })
     */
    private $pulebiletow;

    /**
     * @var \Sale
     *
     * @ORM\ManyToOne(targetEntity="Sale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Sale_id", referencedColumnName="id")
     * })
     */
    private $sale;

    /**
     * @var \Typyseansow
     *
     * @ORM\ManyToOne(targetEntity="Typyseansow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TypySeansow_id", referencedColumnName="id")
     * })
     */
    private $typyseansow;

    /**
     * @var \Wydarzeniaspecjalne
     *
     * @ORM\ManyToOne(targetEntity="Wydarzeniaspecjalne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="WydarzeniaSpecjalne_id", referencedColumnName="id")
     * })
     */
    private $wydarzeniaspecjalne;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Filmy", inversedBy="seanse")
     * @ORM\JoinTable(name="seans_ma_filmy",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Seanse_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Filmy_id", referencedColumnName="id")
     *   }
     * )
     */
    private $filmy;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->filmy = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
