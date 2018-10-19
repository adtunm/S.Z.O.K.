<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pulebiletow
 *
 * @ORM\Table(name="pulebiletow", uniqueConstraints={@ORM\UniqueConstraint(name="idPuleBiletow_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="NazwaPuli_UNIQUE", columns={"nazwa"})})
 * @ORM\Entity
 */
class Pulebiletow
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
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
     * @ORM\ManyToMany(targetEntity="Rodzajebiletow", inversedBy="pulebiletow")
     * @ORM\JoinTable(name="pulabiletow_ma_rodzajebiletow",
     *   joinColumns={
     *     @ORM\JoinColumn(name="PuleBiletow_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="RodzajeBiletow_id", referencedColumnName="id")
     *   }
     * )
     */
    private $rodzajebiletow;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rodzajebiletow = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
