<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rodzajebiletow
 *
 * @ORM\Table(name="rodzajebiletow", uniqueConstraints={@ORM\UniqueConstraint(name="idRodzajBiletow_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="NazwaBiletu_UNIQUE", columns={"nazwa"})})
 * @ORM\Entity
 */
class Rodzajebiletow
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

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pulebiletow", mappedBy="rodzajebiletow")
     */
    private $pulebiletow;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pulebiletow = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
