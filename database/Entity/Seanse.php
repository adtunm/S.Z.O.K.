<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seanse
 *
 * @ORM\Table(name="seanse", uniqueConstraints={@ORM\UniqueConstraint(name="idSeanse_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Seanse_WydarzeniaSpecjalne1_idx", columns={"WydarzeniaSpecjalne_id"}), @ORM\Index(name="fk_Seanse_TypySeansow1_idx", columns={"TypySeansow_id"}), @ORM\Index(name="fk_Seanse_Sale1_idx", columns={"Sale_id"}), @ORM\Index(name="fk_Seanse_PuleBiletow1_idx", columns={"PuleBiletow_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SeanseRepository")
 */
class Seanse
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getPoczatekseansu(): \DateTime
    {
        return $this->poczatekseansu;
    }

    /**
     * @param \DateTime $poczatekseansu
     */
    public function setPoczatekseansu(\DateTime $poczatekseansu): void
    {
        $this->poczatekseansu = $poczatekseansu;
    }

    /**
     * @return bool|null
     */
    public function getCzyodwolany(): ?bool
    {
        return $this->czyodwolany;
    }

    /**
     * @param bool|null $czyodwolany
     */
    public function setCzyodwolany(?bool $czyodwolany): void
    {
        $this->czyodwolany = $czyodwolany;
    }

    /**
     * @return Pulebiletow
     */
    public function getPulebiletow(): Pulebiletow
    {
        return $this->pulebiletow;
    }

    /**
     * @param Pulebiletow $pulebiletow
     */
    public function setPulebiletow(Pulebiletow $pulebiletow): void
    {
        $this->pulebiletow = $pulebiletow;
    }

    /**
     * @return Sale|null
     */
    public function getSale(): ?Sale
    {
        return $this->sale;
    }

    /**
     * @param Sale $sale
     */
    public function setSale(Sale $sale): void
    {
        $this->sale = $sale;
    }

    /**
     * @return Typyseansow|null
     */
    public function getTypyseansow(): ?Typyseansow
    {
        return $this->typyseansow;
    }

    /**
     * @param Typyseansow $typyseansow
     */
    public function setTypyseansow(Typyseansow $typyseansow): void
    {
        $this->typyseansow = $typyseansow;
    }

    /**
     * @return Wydarzeniaspecjalne|null
     */
    public function getWydarzeniaspecjalne(): ?Wydarzeniaspecjalne
    {
        return $this->wydarzeniaspecjalne;
    }

    /**
     * @param Wydarzeniaspecjalne $wydarzeniaspecjalne
     */
    public function setWydarzeniaspecjalne(Wydarzeniaspecjalne $wydarzeniaspecjalne): void
    {
        $this->wydarzeniaspecjalne = $wydarzeniaspecjalne;
    }
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
     * @ORM\ManyToOne(targetEntity="Pulebiletow", inversedBy="seanse")
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
     * @ORM\OneToMany(targetEntity="SeansMaFilmy", mappedBy="seanse")
     */
    private $seansMaFilmy;

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeansMaFilmy(): \Doctrine\Common\Collections\Collection
    {
        return $this->seansMaFilmy;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $seansMaFilmy
     */
    public function setSeansMaFilmy(\Doctrine\Common\Collections\Collection $seansMaFilmy): void
    {
        $this->seansMaFilmy = $seansMaFilmy;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Tranzakcje", mappedBy="seanse")
     */
    private $tranzakcje;

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTranzakcje(): \Doctrine\Common\Collections\Collection
    {
        return $this->tranzakcje;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $tranzakcje
     */
    public function setTranzakcje(\Doctrine\Common\Collections\Collection $tranzakcje): void
    {
        $this->tranzakcje = $tranzakcje;
    }
}
