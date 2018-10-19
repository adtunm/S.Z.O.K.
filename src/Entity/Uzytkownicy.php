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
