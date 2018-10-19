<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rzedy
 *
 * @ORM\Table(name="rzedy", uniqueConstraints={@ORM\UniqueConstraint(name="idRzedy_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Rzedy_Sale1_idx", columns={"Sale_id"}), @ORM\Index(name="fk_Rzedy_TypyRzedow1_idx", columns={"TypyRzedow_id"})})
 * @ORM\Entity
 */
class Rzedy
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
     * @ORM\Column(name="numerRzedu", type="integer", nullable=false)
     */
    private $numerrzedu;

    /**
     * @var \Sale
     *
     * @ORM\ManyToOne(targetEntity="Sale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Sale_id", referencedColumnName="id")
     * })
     */
    private $sale;

    /**
     * @var \Typyrzedow
     *
     * @ORM\ManyToOne(targetEntity="Typyrzedow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TypyRzedow_id", referencedColumnName="id")
     * })
     */
    private $typyrzedow;


}
