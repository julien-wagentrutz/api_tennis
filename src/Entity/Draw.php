<?php

namespace App\Entity;

use App\Repository\DrawRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DrawRepository::class)
 */
class Draw
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $value;

    /**
     * @ORM\OneToMany(targetEntity=Tourney::class, mappedBy="draw")
     */
    private $tourneys;

    public function __construct()
    {
        $this->tourneys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?int
    {
        return $this->value;
    }

    public function setLabel(int $label): self
    {
        $this->value = $label;

        return $this;
    }

    /**
     * @return Collection|Tourney[]
     */
    public function getTourneys(): Collection
    {
        return $this->tourneys;
    }

    public function addTourney(Tourney $tourney): self
    {
        if (!$this->tourneys->contains($tourney)) {
            $this->tourneys[] = $tourney;
            $tourney->setDraw($this);
        }

        return $this;
    }

    public function removeTourney(Tourney $tourney): self
    {
        if ($this->tourneys->removeElement($tourney)) {
            // set the owning side to null (unless already changed)
            if ($tourney->getDraw() === $this) {
                $tourney->setDraw(null);
            }
        }

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
