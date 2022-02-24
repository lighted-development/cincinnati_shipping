<?php

namespace App\Entity\Main;

use App\Repository\Main\BatchControlLtlRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BatchControlLtlRepository::class)
 */
class BatchControlLtl
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ltlPicker;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $ltlLines;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLtlPicker(): ?string
    {
        return $this->ltlPicker;
    }

    public function setLtlPicker(?string $ltlPicker): self
    {
        $this->ltlPicker = $ltlPicker;

        return $this;
    }

    public function getLtlLines(): ?string
    {
        return $this->ltlLines;
    }

    public function setLtlLines(?string $ltlLines): self
    {
        $this->ltlLines = $ltlLines;

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
