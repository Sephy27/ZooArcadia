<?php

namespace App\Entity;

use App\Repository\RapportVeterinaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportVeterinaireRepository::class)]
class RapportVeterinaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $foodType = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $foodWeight = null;

    #[ORM\Column(length: 255)]
    private ?string $avis = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'rapportVeterinaires')]
    private ?Animals $idAnimal = null;

    #[ORM\ManyToOne(inversedBy: 'rapportVeterinaires')]
    private ?Users $idUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFoodType(): ?string
    {
        return $this->foodType;
    }

    public function setFoodType(string $foodType): static
    {
        $this->foodType = $foodType;

        return $this;
    }

    public function getFoodWeight(): ?string
    {
        return $this->foodWeight;
    }

    public function setFoodWeight(string $foodWeight): static
    {
        $this->foodWeight = $foodWeight;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(string $avis): static
    {
        $this->avis = $avis;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIdAnimal(): ?Animals
    {
        return $this->idAnimal;
    }

    public function setIdAnimal(?Animals $idAnimal): static
    {
        $this->idAnimal = $idAnimal;

        return $this;
    }

    public function getIdUser(): ?Users
    {
        return $this->idUser;
    }

    public function setIdUser(?Users $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }
}
