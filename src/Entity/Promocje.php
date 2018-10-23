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
     * @return string
     */
    public function getNazwa(): string
    {
        return $this->nazwa;
    }

    /**
     * @param string $nazwa
     */
    public function setNazwa(string $nazwa): void
    {
        $this->nazwa = $nazwa;
    }

    /**
     * @return bool
     */
    public function isCzykwotowa(): bool
    {
        return $this->czykwotowa;
    }

    /**
     * @param bool $czykwotowa
     */
    public function setCzykwotowa(bool $czykwotowa): void
    {
        $this->czykwotowa = $czykwotowa;
    }

    /**
     * @return string
     */
    public function getWartosc(): string
    {
        return $this->wartosc;
    }

    /**
     * @param string $wartosc
     */
    public function setWartosc(string $wartosc): void
    {
        $this->wartosc = $wartosc;
    }

    /**
     * @return \DateTime
     */
    public function getPoczatekpromocji(): \DateTime
    {
        return $this->poczatekpromocji;
    }

    /**
     * @param \DateTime $poczatekpromocji
     */
    public function setPoczatekpromocji(\DateTime $poczatekpromocji): void
    {
        $this->poczatekpromocji = $poczatekpromocji;
    }

    /**
     * @return \DateTime
     */
    public function getKoniecpromocji(): \DateTime
    {
        return $this->koniecpromocji;
    }

    /**
     * @param \DateTime $koniecpromocji
     */
    public function setKoniecpromocji(\DateTime $koniecpromocji): void
    {
        $this->koniecpromocji = $koniecpromocji;
    }

    /**
     * @return bool|null
     */
    public function getCzykobieta(): ?bool
    {
        return $this->czykobieta;
    }

    /**
     * @param bool|null $czykobieta
     */
    public function setCzykobieta(?bool $czykobieta): void
    {
        $this->czykobieta = $czykobieta;
    }

    /**
     * @return \DateTime|null
     */
    public function getStaz(): ?\DateTime
    {
        return $this->staz;
    }

    /**
     * @param \DateTime|null $staz
     */
    public function setStaz(?\DateTime $staz): void
    {
        $this->staz = $staz;
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
