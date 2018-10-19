<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Miejsca
 *
 * @ORM\Table(name="miejsca", uniqueConstraints={@ORM\UniqueConstraint(name="idMiejsca_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Miejsca_Rzedy1_idx", columns={"Rzedy_id"})})
 * @ORM\Entity
 */
class Miejsca
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
     * @var int
     *
     * @ORM\Column(name="pozycja", type="integer", nullable=false)
     */
    private $pozycja;

    /**
     * @var int
     *
     * @ORM\Column(name="numerMiejsca", type="integer", nullable=false)
     */
    private $numermiejsca;

    /**
     * @var \Rzedy
     *
     * @ORM\ManyToOne(targetEntity="Rzedy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Rzedy_id", referencedColumnName="id")
     * })
     */
    private $rzedy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Rezerwacje", mappedBy="miejsca")
     */
    private $rezerwacje;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rezerwacje = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
