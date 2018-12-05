<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pulebiletow
 *
 * @ORM\Table(name="pulebiletow", uniqueConstraints={@ORM\UniqueConstraint(name="idPuleBiletow_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="NazwaPuli_UNIQUE", columns={"nazwa"})})
 * @ORM\Entity(repositoryClass="App\Repository\PulebiletowRepository")
 */
class Pulebiletow
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
     * @ORM\OneToMany(targetEntity="PulabiletowMaRodzajebiletow", mappedBy="pulebiletow")
     */
    private $pulabiletowmarodzajebiletow;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Seanse", mappedBy="pulebiletow")
     */
    private $seanse;

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeanse(): \Doctrine\Common\Collections\Collection
    {
        return $this->seanse;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $seanse
     */
    public function setSeanse(\Doctrine\Common\Collections\Collection $seanse): void
    {
        $this->seanse = $seanse;
    }




    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPulabiletowmarodzajebiletow(): \Doctrine\Common\Collections\Collection
    {
        return $this->pulabiletowmarodzajebiletow;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $pulabiletowmarodzajebiletow
     */
    public function setPulabiletowmarodzajebiletow(\Doctrine\Common\Collections\Collection $pulabiletowmarodzajebiletow): void
    {
        $this->pulabiletowmarodzajebiletow = $pulabiletowmarodzajebiletow;
    }


}
