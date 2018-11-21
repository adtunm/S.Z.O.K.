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
    public function getNazwa(): string
    {
        return $this->nazwa;
    }

    /**
     * @param string $nazwa
     */
    public function setNazwa(string $nazwa): void
    {
        $this->nazwa = $nazwa;
    }

    /**
     * @return bool|null
     */
    public function getUsunieto(): ?bool
    {
        return $this->usunieto;
    }

    /**
     * @param bool|null $usunieto
     */
    public function setUsunieto(?bool $usunieto): void
    {
        $this->usunieto = $usunieto;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFilmy(): \Doctrine\Common\Collections\Collection
    {
        return $this->filmy;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $filmy
     */
    public function setFilmy(\Doctrine\Common\Collections\Collection $filmy): void
    {
        $this->filmy = $filmy;
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

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->nazwa;
    }
}
