<?php

namespace App\Entity;

use App\Repository\PersonCovidRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonCovidRepository::class)
 */
class PersonCovid
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="personCovid", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $asCovid;

    /**
     * @ORM\Column(type="datetime")
     */
    private $infectedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAsCovid(): ?User
    {
        return $this->asCovid;
    }

    public function setAsCovid(User $asCovid): self
    {
        $this->asCovid = $asCovid;

        return $this;
    }

    public function getInfectedAt(): ?\DateTimeInterface
    {
        return $this->infectedAt;
    }

    public function setInfectedAt(\DateTimeInterface $infectedAt): self
    {
        $this->infectedAt = $infectedAt;

        return $this;
    }
}
