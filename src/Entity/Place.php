<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaceRepository::class)
 */
class Place
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $street;

    /**
     * @ORM\Column(type="integer")
     */
    private $streetNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxNumberOfPersons;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=PersonPlace::class, mappedBy="place", orphanRemoval=true)
     */
    private $peopleWhoVisited;

    public function __construct()
    {
        $this->peopleWhoVisited = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getStreetNumber(): ?int
    {
        return $this->streetNumber;
    }

    public function setStreetNumber(int $streetNumber): self
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getMaxNumberOfPersons(): ?int
    {
        return $this->maxNumberOfPersons;
    }

    public function setMaxNumberOfPersons(int $maxNumberOfPersons): self
    {
        $this->maxNumberOfPersons = $maxNumberOfPersons;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|PersonPlace[]
     */
    public function getPeopleWhoVisited(): Collection
    {
        return $this->peopleWhoVisited;
    }

    public function addPeopleWhoVisited(PersonPlace $peopleWhoVisited): self
    {
        if (!$this->peopleWhoVisited->contains($peopleWhoVisited)) {
            $this->peopleWhoVisited[] = $peopleWhoVisited;
            $peopleWhoVisited->setPlace($this);
        }

        return $this;
    }

    public function removePeopleWhoVisited(PersonPlace $peopleWhoVisited): self
    {
        if ($this->peopleWhoVisited->removeElement($peopleWhoVisited)) {
            // set the owning side to null (unless already changed)
            if ($peopleWhoVisited->getPlace() === $this) {
                $peopleWhoVisited->setPlace(null);
            }
        }

        return $this;
    }
}
