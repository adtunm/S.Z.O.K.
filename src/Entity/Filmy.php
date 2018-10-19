<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmy
 *
 * @ORM\Table(name="filmy", uniqueConstraints={@ORM\UniqueConstraint(name="idFilmy_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Filmy_KategorieWiekowe1_idx", columns={"KategorieWiekowe_id"})})
 * @ORM\Entity
 */
class Filmy
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
     * @ORM\Column(name="tytul", type="string", length=127, nullable=false)
     */
    private $tytul;

    /**
     * @var string|null
     *
     * @ORM\Column(name="opis", type="string", length=255, nullable=true)
     */
    private $opis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataPremiery", type="date", nullable=false)
     */
    private $datapremiery;

    /**
     * @var int
     *
     * @ORM\Column(name="czasTrwania", type="integer", nullable=false)
     */
    private $czastrwania;

    /**
     * @var int
     *
     * @ORM\Column(name="czasReklam", type="integer", nullable=false)
     */
    private $czasreklam;

    /**
     * @var string|null
     *
     * @ORM\Column(name="plakat", type="string", length=255, nullable=true)
     */
    private $plakat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zwiastun", type="string", length=255, nullable=true)
     */
    private $zwiastun;

    /**
     * @var \Kategoriewiekowe
     *
     * @ORM\ManyToOne(targetEntity="Kategoriewiekowe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="KategorieWiekowe_id", referencedColumnName="id")
     * })
     */
    private $kategoriewiekowe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Rodzajefilmow", inversedBy="filmy")
     * @ORM\JoinTable(name="film_ma_rodzajefilmow",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Filmy_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="RodzajeFilmow_id", referencedColumnName="id")
     *   }
     * )
     */
    private $rodzajefilmow;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Typyseansow", inversedBy="filmy")
     * @ORM\JoinTable(name="film_ma_typyseansow",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Filmy_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="TypySeansow_id", referencedColumnName="id")
     *   }
     * )
     */
    private $typyseansow;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Seanse", mappedBy="filmy")
     */
    private $seanse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rodzajefilmow = new \Doctrine\Common\Collections\ArrayCollection();
        $this->typyseansow = new \Doctrine\Common\Collections\ArrayCollection();
        $this->seanse = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
