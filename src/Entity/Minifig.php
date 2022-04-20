<?php

namespace App\Entity;

use App\Repository\MinifigRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MinifigRepository::class)
 */
class Minifig
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
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $characterName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $currentValue;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $owned;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="minifig")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity=SubTheme::class, mappedBy="minifig")
     */
    private $subThemes;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="minifig")
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity=LegoSet::class, inversedBy="minifigs")
     */
    private $legoSet;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->subThemes = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->legoSet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
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

    public function getCharacterName(): ?string
    {
        return $this->characterName;
    }

    public function setCharacterName(?string $characterName): self
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getCurrentValue(): ?string
    {
        return $this->currentValue;
    }

    public function setCurrentValue(?string $currentValue): self
    {
        $this->currentValue = $currentValue;

        return $this;
    }

    public function getOwned(): ?bool
    {
        return $this->owned;
    }

    public function setOwned(?bool $owned): self
    {
        $this->owned = $owned;

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

    public function setImage(string $image): self
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addMinifig($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeMinifig($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, SubTheme>
     */
    public function getSubThemes(): Collection
    {
        return $this->subThemes;
    }

    public function addSubTheme(SubTheme $subTheme): self
    {
        if (!$this->subThemes->contains($subTheme)) {
            $this->subThemes[] = $subTheme;
            $subTheme->addMinifig($this);
        }

        return $this;
    }

    public function removeSubTheme(SubTheme $subTheme): self
    {
        if ($this->subThemes->removeElement($subTheme)) {
            $subTheme->removeMinifig($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addMinifig($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeMinifig($this);
        }

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
