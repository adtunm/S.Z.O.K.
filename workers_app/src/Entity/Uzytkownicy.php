<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uzytkownicy
 *
 * @ORM\Table(name="uzytkownicy", uniqueConstraints={@ORM\UniqueConstraint(name="idUzytkownicy_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="login_UNIQUE", columns={"login"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"}), @ORM\UniqueConstraint(name="telefon_UNIQUE", columns={"telefon"})})
 * @ORM\Entity
 */
class Uzytkownicy
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
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getHaslo(): string
    {
        return $this->haslo;
    }

    /**
     * @param string $haslo
     */
    public function setHaslo(string $haslo): void
    {
        $this->haslo = $haslo;
    }

    /**
     * @return string
     */
    public function getImie(): string
    {
        return $this->imie;
    }

    /**
     * @param string $imie
     */
    public function setImie(string $imie): void
    {
        $this->imie = $imie;
    }

    /**
     * @return string
     */
    public function getNazwisko(): string
    {
        return $this->nazwisko;
    }

    /**
     * @param string $nazwisko
     */
    public function setNazwisko(string $nazwisko): void
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * @return string
     */
    public function getTelefon(): string
    {
        return $this->telefon;
    }

    /**
     * @param string $telefon
     */
    public function setTelefon(string $telefon): void
    {
        $this->telefon = $telefon;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getDatarejestracji(): \DateTime
    {
        return $this->datarejestracji;
    }

    /**
     * @param \DateTime $datarejestracji
     */
    public function setDatarejestracji(\DateTime $datarejestracji): void
    {
        $this->datarejestracji = $datarejestracji;
    }

    /**
     * @return bool
     */
    public function isCzykobieta(): bool
    {
        return $this->czykobieta;
    }

    /**
     * @param bool $czykobieta
     */
    public function setCzykobieta(bool $czykobieta): void
    {
        $this->czykobieta = $czykobieta;
    }

    /**
     * @return bool|null
     */
    public function getCzyzablowoany(): ?bool
    {
        return $this->czyzablowoany;
    }

    /**
     * @param bool|null $czyzablowoany
     */
    public function setCzyzablowoany(?bool $czyzablowoany): void
    {
        $this->czyzablowoany = $czyzablowoany;
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
     * @ORM\Column(name="login", type="string", length=50, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="haslo", type="string", length=64, nullable=false)
     */
    private $haslo;

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
     * @var \DateTime
     *
     * @ORM\Column(name="dataRejestracji", type="date", nullable=false)
     */
    private $datarejestracji;

    /**
     * @var bool
     *
     * @ORM\Column(name="czyKobieta", type="boolean", nullable=false)
     */
    private $czykobieta;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="czyZablowoany", type="boolean", nullable=true)
     */
    private $czyzablowoany;


}
