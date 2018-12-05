<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vouchery
 *
 * @ORM\Table(name="vouchery", uniqueConstraints={@ORM\UniqueConstraint(name="idVouchery_UNIQUE", columns={"id"})})
 * @ORM\Entity(repositoryClass="App\Repository\VoucherRepository")
 */
class Vouchery
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
     * @return string
     */
    public function getLosowecyfry(): string
    {
        return $this->losowecyfry;
    }

    /**
     * @param string $losowecyfry
     */
    public function setLosowecyfry(string $losowecyfry): void
    {
        $this->losowecyfry = $losowecyfry;
    }

    /**
     * @return string
     */
    public function getCyfrakontrolna(): string
    {
        return $this->cyfrakontrolna;
    }

    /**
     * @param string $cyfrakontrolna
     */
    public function setCyfrakontrolna(string $cyfrakontrolna): void
    {
        $this->cyfrakontrolna = $cyfrakontrolna;
    }

    /**
     * @return \DateTime
     */
    public function getCzaswygenerowania(): \DateTime
    {
        return $this->czaswygenerowania;
    }

    /**
     * @param \DateTime $czaswygenerowania
     */
    public function setCzaswygenerowania(\DateTime $czaswygenerowania): void
    {
        $this->czaswygenerowania = $czaswygenerowania;
    }

    /**
     * @return bool|null
     */
    public function getCzywykorzystany(): ?bool
    {
        return $this->czywykorzystany;
    }

    /**
     * @param bool|null $czywykorzystany
     */
    public function setCzywykorzystany(?bool $czywykorzystany): void
    {
        $this->czywykorzystanyy = $czywykorzystany;
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
    private $czywykorzystany;


}
