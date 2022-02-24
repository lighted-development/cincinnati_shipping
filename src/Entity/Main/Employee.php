<?php

namespace App\Entity\Main;

use App\Repository\Main\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $empNum;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $fName;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpNum(): ?string
    {
        return $this->empNum;
    }

    public function setEmpNum(string $empNum): self
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
}
