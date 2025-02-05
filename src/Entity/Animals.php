<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalsRepository::class)]
class Animals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $healthStatus = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Races $idRace = null;

    /**
     * @var Collection<int, Pictures>
     */
    #[ORM\ManyToMany(targetEntity: Pictures::class, inversedBy: 'animals')]
    private Collection $idPicture;

    #[ORM\ManyToOne(inversedBy: 'idAnimal')]
    private ?Habitats $habitats = null;

    /**
     * @var Collection<int, RapportVeterinaire>
     */
    #[ORM\OneToMany(targetEntity: RapportVeterinaire::class, mappedBy: 'idAnimal')]
    private Collection $rapportVeterinaires;

    public function __construct()
    {
        $this->idPicture = new ArrayCollection();
        $this->rapportVeterinaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getHealthStatus(): ?string
    {
        return $this->healthStatus;
    }

    public function setHealthStatus(string $healthStatus): static
    {
        $this->healthStatus = $healthStatus;

        return $this;
    }

    public function getIdRace(): ?Races
    {
        return $this->idRace;
    }

    public function setIdRace(?Races $idRace): static
    {
        $this->idRace = $idRace;

        return $this;
    }

    /**
     * @return Collection<int, Pictures>
     */
    public function getIdPicture(): Collection
    {
        return $this->idPicture;
    }

    public function addIdPicture(Pictures $idPicture): static
    {
        if (!$this->idPicture->contains($idPicture)) {
            $this->idPicture->add($idPicture);
        }

        return $this;
    }

    public function removeIdPicture(Pictures $idPicture): static
    {
        $this->idPicture->removeElement($idPicture);

        return $this;
    }

    public function getHabitats(): ?Habitats
    {
        return $this->habitats;
    }

    public function setHabitats(?Habitats $habitats): static
    {
        $this->habitats = $habitats;

        return $this;
    }

    /**
     * @return Collection<int, RapportVeterinaire>
     */
    public function getRapportVeterinaires(): Collection
    {
        return $this->rapportVeterinaires;
    }

    public function addRapportVeterinaire(RapportVeterinaire $rapportVeterinaire): static
    {
        if (!$this->rapportVeterinaires->contains($rapportVeterinaire)) {
            $this->rapportVeterinaires->add($rapportVeterinaire);
            $rapportVeterinaire->setIdAnimal($this);
        }

        return $this;
    }

    public function removeRapportVeterinaire(RapportVeterinaire $rapportVeterinaire): static
    {
        if ($this->rapportVeterinaires->removeElement($rapportVeterinaire)) {
            // set the owning side to null (unless already changed)
            if ($rapportVeterinaire->getIdAnimal() === $this) {
                $rapportVeterinaire->setIdAnimal(null);
            }
        }

        return $this;
    }
}
