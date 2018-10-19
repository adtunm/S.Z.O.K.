<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kategoriewiekowe
 *
 * @ORM\Table(name="kategoriewiekowe", uniqueConstraints={@ORM\UniqueConstraint(name="idKategorieWiekowe_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="nazwa_UNIQUE", columns={"nazwa"})})
 * @ORM\Entity
 */
class Kategoriewiekowe
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
     * @ORM\Column(name="nazwa", type="string", length=3, nullable=false)
     */
    private $nazwa;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="usunieto", type="boolean", nullable=true)
     */
    private $usunieto;


}
