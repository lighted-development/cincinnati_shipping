<?php

namespace App\Entity\Main;

use App\Repository\Main\MainRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MainRepository::class)
 */
class Main
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $dealerInvoice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $empNum;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $fName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $lName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $asgnDate;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $asgnTime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $closed;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $closedTime;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ordType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDealerInvoice(): ?string
    {
        return $this->dealerInvoice;
    }

    public function setDealerInvoice(string $dealerInvoice): self
    {
        $this->dealerInvoice = $dealerInvoice;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getEmpNum(): ?string
    {
        return $this->empNum;
    }

    public function setEmpNum(?string $empNum): self
    {
        $this->empNum = $empNum;

        return $this;
    }

    public function getFName(): ?string
    {
        return $this->fName;
    }

    public function setFName(?string $fName): self
    {
        $this->fName = $fName;

        return $this;
    }

    public function getLName(): ?string
    {
        return $this->lName;
    }

    public function setLName(?string $lName): self
    {
        $this->lName = $lName;

        return $this;
    }

    public function getAsgnDate(): ?\DateTimeInterface
    {
        return $this->asgnDate;
    }

    public function setAsgnDate(?\DateTimeInterface $asgnDate): self
    {
        $this->asgnDate = $asgnDate;

        return $this;
    }

    public function getAsgnTime(): ?\DateTimeInterface
    {
        return $this->asgnTime;
    }

    public function setAsgnTime(?\DateTimeInterface $asgnTime): self
    {
        $this->asgnTime = $asgnTime;

        return $this;
    }

    public function getClosed(): ?bool
    {
        return $this->closed;
    }

    public function setClosed(bool $closed): self
    {
        $this->closed = $closed;

        return $this;
    }

    public function getClosedTime(): ?\DateTimeInterface
    {
        return $this->closedTime;
    }

    public function setClosedTime(?\DateTimeInterface $closedTime): self
    {
        $this->closedTime = $closedTime;

        return $this;
    }

    public function getOrdType(): ?string
    {
        return $this->ordType;
    }

    public function setOrdType(?string $ordType): self
    {
        $this->ordType = $ordType;

        return $this;
    }
}
