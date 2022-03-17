<?php

namespace App\Entity;

use App\Repository\AudiometrieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AudiometrieRepository::class)
 */
class Audiometrie
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
    private $designation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeaudiometrie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeoreille;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="audiometries")
     */
    private $medecin;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="patient")
     */
    private $patient;

    /**
     * @ORM\OneToMany(targetEntity=Point::class, mappedBy="audiometrie")
     */
    private $points;

    public function __construct()
    {
        $this->points = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getTypeaudiometrie(): ?string
    {
        return $this->typeaudiometrie;
    }

    public function setTypeaudiometrie(string $typeaudiometrie): self
    {
        $this->typeaudiometrie = $typeaudiometrie;

        return $this;
    }

    public function getTypeoreille(): ?string
    {
        return $this->typeoreille;
    }

    public function setTypeoreille(string $typeoreille): self
    {
        $this->typeoreille = $typeoreille;

        return $this;
    }

    public function getMedecin(): ?User
    {
        return $this->medecin;
    }

    public function setMedecin(?User $medecin): self
    {
        $this->medecin = $medecin;

        return $this;
    }

    public function getPatient(): ?User
    {
        return $this->patient;
    }

    public function setPatient(?User $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * @return Collection<int, Point>
     */
    public function getPoints(): Collection
    {
        return $this->points;
    }

    public function addPoint(Point $point): self
    {
        if (!$this->points->contains($point)) {
            $this->points[] = $point;
            $point->setAudiometrie($this);
        }

        return $this;
    }

    public function removePoint(Point $point): self
    {
        if ($this->points->removeElement($point)) {
            // set the owning side to null (unless already changed)
            if ($point->getAudiometrie() === $this) {
                $point->setAudiometrie(null);
            }
        }

        return $this;
    }
}
