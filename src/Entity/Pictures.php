<?php

namespace App\Entity;

use App\Repository\PicturesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PicturesRepository::class)]
class Pictures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BLOB)]
    private $dataPicture = null;

    /**
     * @var Collection<int, Animals>
     */
    #[ORM\ManyToMany(targetEntity: Animals::class, mappedBy: 'idPicture')]
    private Collection $animals;

    /**
     * @var Collection<int, Habitats>
     */
    #[ORM\ManyToMany(targetEntity: Habitats::class, mappedBy: 'idPicture')]
    private Collection $habitats;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
        $this->habitats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataPicture()
    {
        return $this->dataPicture;
    }

    public function setDataPicture($dataPicture): static
    {
        $this->dataPicture = $dataPicture;

        return $this;
    }

    /**
     * @return Collection<int, Animals>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animals $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->addIdPicture($this);
        }

        return $this;
    }

    public function removeAnimal(Animals $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            $animal->removeIdPicture($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Habitats>
     */
    public function getHabitats(): Collection
    {
        return $this->habitats;
    }

    public function addHabitat(Habitats $habitat): static
    {
        if (!$this->habitats->contains($habitat)) {
            $this->habitats->add($habitat);
            $habitat->addIdPicture($this);
        }

        return $this;
    }

    public function removeHabitat(Habitats $habitat): static
    {
        if ($this->habitats->removeElement($habitat)) {
            $habitat->removeIdPicture($this);
        }

        return $this;
    }
}
