<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typyseansow
 *
 * @ORM\Table(name="typyseansow", uniqueConstraints={@ORM\UniqueConstraint(name="idTypySeansow_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="nazwa_UNIQUE", columns={"nazwa"})})
 * @ORM\Entity
 */
class Typyseansow
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
     * @ORM\ManyToMany(targetEntity="Filmy", mappedBy="typyseansow")
     */
    private $filmy;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->filmy = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
