<?php

namespace App\Entity;

use App\Repository\SubThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubThemeRepository::class)
 */
class SubTheme
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Theme::class, inversedBy="subTheme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theme;

    /**
     * @ORM\ManyToMany(targetEntity=Minifig::class, inversedBy="subThemes")
     */
    private $minifig;

    /**
     * @ORM\ManyToMany(targetEntity=LegoSet::class, inversedBy="subThemes")
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

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
