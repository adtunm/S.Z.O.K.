<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rodzajeplatnosci
 *
 * @ORM\Table(name="rodzajeplatnosci", uniqueConstraints={@ORM\UniqueConstraint(name="idRodzajePlatnosci_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Rodzajeplatnosci
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
     * @ORM\Column(name="nazwa", type="string", length=45, nullable=false)
     */
    private $nazwa;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="usunieto", type="boolean", nullable=true)
     */
    private $usunieto;


}
