<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pracownicy
 *
 * @ORM\Table(name="pracownicy", uniqueConstraints={@ORM\UniqueConstraint(name="idPracownicy_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="login_UNIQUE", columns={"login"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"}), @ORM\UniqueConstraint(name="telefon_UNIQUE", columns={"telefon"})}, indexes={@ORM\Index(name="fk_Pracownicy_Role1_idx", columns={"Role_id"})})
 * @ORM\Entity
 */
class Pracownicy
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="ostatniaAktualizacja", type="datetime", nullable=true)
     */
    private $ostatniaaktualizacja;

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Role_id", referencedColumnName="id")
     * })
     */
    private $role;


}
