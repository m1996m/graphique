<?php

namespace App\Entity;

use App\Repository\PointRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PointRepository::class)
 */
class Point
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
    private $abscisse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ordonnee;

    /**
     * @ORM\ManyToOne(targetEntity=Audiometrie::class, inversedBy="points")
     */
    private $audiometrie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbscisse(): ?string
    {
        return $this->abscisse;
    }

    public function setAbscisse(string $abscisse): self
    {
        $this->abscisse = $abscisse;

        return $this;
    }

    public function getOrdonnee(): ?string
    {
        return $this->ordonnee;
    }

    public function setOrdonnee(string $ordonnee): self
    {
        $this->ordonnee = $ordonnee;

        return $this;
    }

    public function getAudiometrie(): ?Audiometrie
    {
        return $this->audiometrie;
    }

    public function setAudiometrie(?Audiometrie $audiometrie): self
    {
        $this->audiometrie = $audiometrie;

        return $this;
    }
}
