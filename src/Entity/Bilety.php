<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bilety
 *
 * @ORM\Table(name="bilety", uniqueConstraints={@ORM\UniqueConstraint(name="Biletcol_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Tranzakcje_has_RodzajeBiletow_RodzajeBiletow1_idx", columns={"RodzajeBiletow_id"}), @ORM\Index(name="fk_Tranzakcje_has_RodzajeBiletow_Tranzakcje1_idx", columns={"Tranzakcje_id"}), @ORM\Index(name="fk_Tranzakcja_ma_Bilet_Miejsca1_idx", columns={"Miejsca_id"}), @ORM\Index(name="fk_Bilety_Vouchery1_idx", columns={"Vouchery_id"})})
 * @ORM\Entity
 */
class Bilety
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
     * @ORM\Column(name="cena", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $cena;

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
     * @var bool|null
     *
     * @ORM\Column(name="czyWykorzystany", type="boolean", nullable=true)
     */
    private $czywykorzystany;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="czyAnulowany", type="boolean", nullable=true)
     */
    private $czyanulowany;

    /**
     * @var \Vouchery
     *
     * @ORM\ManyToOne(targetEntity="Vouchery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Vouchery_id", referencedColumnName="id")
     * })
     */
    private $vouchery;

    /**
     * @var \Miejsca
     *
     * @ORM\ManyToOne(targetEntity="Miejsca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Miejsca_id", referencedColumnName="id")
     * })
     */
    private $miejsca;

    /**
     * @var \Rodzajebiletow
     *
     * @ORM\ManyToOne(targetEntity="Rodzajebiletow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RodzajeBiletow_id", referencedColumnName="id")
     * })
     */
    private $rodzajebiletow;

    /**
     * @var \Tranzakcje
     *
     * @ORM\ManyToOne(targetEntity="Tranzakcje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Tranzakcje_id", referencedColumnName="id")
     * })
     */
    private $tranzakcje;


}
