<?php

namespace App\Entity\Main;

use App\Repository\Main\CriteriaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CriteriaRepository::class)
 */
class Criteria
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $dealerInvoice;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $employeeNum;

    /**
     * @ORM\Column(type="boolean")
     */
    private $closed;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $closedTime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDealerInvoice(): ?string
    {
        return $this->dealerInvoice;
    }

    public function setDealerInvoice(?string $dealerInvoice): self
    {
        $this->dealerInvoice = $dealerInvoice;

        return $this;
    }

    public function getEmployeeNum(): ?string
    {
        return $this->employeeNum;
    }

    public function setEmployeeNum(?string $employeeNum): self
    {
        $this->employeeNum = $employeeNum;

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
}
