<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Wydarzeniaspecjalne
 *
 * @ORM\Table(name="wydarzeniaspecjalne", uniqueConstraints={@ORM\UniqueConstraint(name="idWydarzeniaSpecjalne_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="nazwa_UNIQUE", columns={"nazwa"})})
 * @ORM\Entity(repositoryClass="App\Repository\WydarzeniaSpecjalneRespository")
 * @UniqueEntity(
 *     fields={"nazwa"},
 *     errorPath="nazwa",
 *     message="Ta instancja jest juz w bazie. Jeżeli chcesz ją użyć przywróć ją z tabeli usuniętych wartości."
 * )
 */
class Wydarzeniaspecjalne
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
    public function getNazwa(): ?string
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
     *
     * @Assert\Regex(
     *     pattern="/^[\p{L}\d\s\-]+$/u",
     *     message="Nazwa powinna się składać tylko z liter, spacji, myślników i cyfr."
     * )
     * @Assert\Length(
     *     max = 45,
     *     min = 3,
     *     maxMessage = "Nazwa instancji może zawierać maksymalnie 45 znaków.",
     *     minMessage = "Nazwa instancji musi zawierać minimum 3 znaki."
     * )
     */
    private $nazwa;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="usunieto", type="boolean", nullable=true)
     */
    private $usunieto;
}
