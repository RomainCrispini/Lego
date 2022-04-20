<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
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
     * @ORM\ManyToMany(targetEntity=Minifig::class, inversedBy="tags")
     */
    private $minifig;

    /**
     * @ORM\ManyToMany(targetEntity=LegoSet::class, inversedBy="tags")
     */
    private $legoSet;

    public function __construct()
    {
        $this->minifig = new ArrayCollection();
        $this->legoSet = new ArrayCollection();
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

    /**
     * @return Collection<int, Minifig>
     */
    public function getMinifig(): Collection
    {
        return $this->minifig;
    }

    public function addMinifig(Minifig $minifig): self
    {
        if (!$this->minifig->contains($minifig)) {
            $this->minifig[] = $minifig;
        }

        return $this;
    }

    public function removeMinifig(Minifig $minifig): self
    {
        $this->minifig->removeElement($minifig);

        return $this;
    }

    /**
     * @return Collection<int, LegoSet>
     */
    public function getLegoSet(): Collection
    {
        return $this->legoSet;
    }

    public function addLegoSet(LegoSet $legoSet): self
    {
        if (!$this->legoSet->contains($legoSet)) {
            $this->legoSet[] = $legoSet;
        }

        return $this;
    }

    public function removeLegoSet(LegoSet $legoSet): self
    {
        $this->legoSet->removeElement($legoSet);

        return $this;
    }
}
