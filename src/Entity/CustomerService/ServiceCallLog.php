<?php

namespace App\Entity\CustomerService;

use App\Repository\CustomerService\ServiceCallLogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceCallLogRepository::class)
 */
class ServiceCallLog
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
    private $rep;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $callDate;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $callTime;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $dlrCode;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $contact;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $a1;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $a2;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $a3;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $a4;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $ba;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $bc;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $bd;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $bg;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $bi;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $bm;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $bt;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $c;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $d;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $e;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $f;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $g;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $h;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $i;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $j;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="boolean")
     */
    private $followup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRep(): ?string
    {
        return $this->rep;
    }

    public function setRep(?string $rep): self
    {
        $this->rep = $rep;

        return $this;
    }

    public function getCallDate(): ?\DateTimeInterface
    {
        return $this->callDate;
    }

    public function setCallDate(?\DateTimeInterface $callDate): self
    {
        $this->callDate = $callDate;

        return $this;
    }

    public function getCallTime(): ?\DateTimeInterface
    {
        return $this->callTime;
    }

    public function setCallTime(?\DateTimeInterface $callTime): self
    {
        $this->callTime = $callTime;

        return $this;
    }

    public function getDlrCode(): ?string
    {
        return $this->dlrCode;
    }

    public function setDlrCode(?string $dlrCode): self
    {
        $this->dlrCode = $dlrCode;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getA1(): ?int
    {
        return $this->a1;
    }

    public function setA1(?int $a1): self
    {
        $this->a1 = $a1;

        return $this;
    }

    public function getA2(): ?int
    {
        return $this->a2;
    }

    public function setA2(?int $a2): self
    {
        $this->a2 = $a2;

        return $this;
    }

    public function getA3(): ?int
    {
        return $this->a3;
    }

    public function setA3(?int $a3): self
    {
        $this->a3 = $a3;

        return $this;
    }

    public function getA4(): ?int
    {
        return $this->a4;
    }

    public function setA4(?int $a4): self
    {
        $this->a4 = $a4;

        return $this;
    }

    public function getBa(): ?int
    {
        return $this->ba;
    }

    public function setBa(?int $ba): self
    {
        $this->ba = $ba;

        return $this;
    }

    public function getBc(): ?int
    {
        return $this->bc;
    }

    public function setBc(?int $bc): self
    {
        $this->bc = $bc;

        return $this;
    }

    public function getBd(): ?int
    {
        return $this->bd;
    }

    public function setBd(?int $bd): self
    {
        $this->bd = $bd;

        return $this;
    }

    public function getBg(): ?int
    {
        return $this->bg;
    }

    public function setBg(?int $bg): self
    {
        $this->bg = $bg;

        return $this;
    }

    public function getBi(): ?int
    {
        return $this->bi;
    }

    public function setBi(?int $bi): self
    {
        $this->bi = $bi;

        return $this;
    }

    public function getBm(): ?int
    {
        return $this->bm;
    }

    public function setBm(?int $bm): self
    {
        $this->bm = $bm;

        return $this;
    }

    public function getBt(): ?int
    {
        return $this->bt;
    }

    public function setBt(?int $bt): self
    {
        $this->bt = $bt;

        return $this;
    }

    public function getC(): ?int
    {
        return $this->c;
    }

    public function setC(?int $c): self
    {
        $this->c = $c;

        return $this;
    }

    public function getD(): ?int
    {
        return $this->d;
    }

    public function setD(?int $d): self
    {
        $this->d = $d;

        return $this;
    }

    public function getE(): ?int
    {
        return $this->e;
    }

    public function setE(?int $e): self
    {
        $this->e = $e;

        return $this;
    }

    public function getF(): ?int
    {
        return $this->f;
    }

    public function setF(?int $f): self
    {
        $this->f = $f;

        return $this;
    }

    public function getG(): ?int
    {
        return $this->g;
    }

    public function setG(?int $g): self
    {
        $this->g = $g;

        return $this;
    }

    public function getH(): ?int
    {
        return $this->h;
    }

    public function setH(?int $h): self
    {
        $this->h = $h;

        return $this;
    }

    public function getI(): ?int
    {
        return $this->i;
    }

    public function setI(?int $i): self
    {
        $this->i = $i;

        return $this;
    }

    public function getJ(): ?int
    {
        return $this->j;
    }

    public function setJ(?int $j): self
    {
        $this->j = $j;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getFollowup(): ?bool
    {
        return $this->followup;
    }

    public function setFollowup(bool $followup): self
    {
        $this->followup = $followup;

        return $this;
    }
}
