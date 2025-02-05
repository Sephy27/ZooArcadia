<?php

namespace App\Entity;

use App\Repository\HabitatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitatsRepository::class)]
class Habitats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    /**
     * @var Collection<int, Animals>
     */
    #[ORM\OneToMany(targetEntity: Animals::class, mappedBy: 'habitats')]
    private Collection $idAnimal;

    /**
     * @var Collection<int, Pictures>
     */
    #[ORM\ManyToMany(targetEntity: Pictures::class, inversedBy: 'habitats')]
    private Collection $idPicture;

    public function __construct()
    {
        $this->idAnimal = new ArrayCollection();
        $this->idPicture = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Animals>
     */
    public function getIdAnimal(): Collection
    {
        return $this->idAnimal;
    }

    public function addIdAnimal(Animals $idAnimal): static
    {
        if (!$this->idAnimal->contains($idAnimal)) {
            $this->idAnimal->add($idAnimal);
            $idAnimal->setHabitats($this);
        }

        return $this;
    }

    public function removeIdAnimal(Animals $idAnimal): static
    {
        if ($this->idAnimal->removeElement($idAnimal)) {
            // set the owning side to null (unless already changed)
            if ($idAnimal->getHabitats() === $this) {
                $idAnimal->setHabitats(null);
            }
        }

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
}
