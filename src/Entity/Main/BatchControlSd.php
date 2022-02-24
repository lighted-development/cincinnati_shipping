<?php

namespace App\Entity\Main;

use App\Repository\Main\BatchControlSdRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BatchControlSdRepository::class)
 */
class BatchControlSd
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
    private $sdPicker;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $sdLines;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSdPicker(): ?string
    {
        return $this->sdPicker;
    }

    public function setSdPicker(?string $sdPicker): self
    {
        $this->sdPicker = $sdPicker;

        return $this;
    }

    public function getSdLines(): ?string
    {
        return $this->sdLines;
    }

    public function setSdLines(?string $sdLines): self
    {
        $this->sdLines = $sdLines;

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
