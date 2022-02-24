<?php

namespace App\Entity\Main;

use App\Repository\Main\BatchControlVorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BatchControlVorRepository::class)
 */
class BatchControlVor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $vorPicker;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $vorLines;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVorPicker(): ?string
    {
        return $this->vorPicker;
    }

    public function setVorPicker(?string $vorPicker): self
    {
        $this->vorPicker = $vorPicker;

        return $this;
    }

    public function getVorLines(): ?string
    {
        return $this->vorLines;
    }

    public function setVorLines(?string $vorLines): self
    {
        $this->vorLines = $vorLines;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
