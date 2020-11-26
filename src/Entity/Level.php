<?php

namespace App\Entity;

use App\Repository\LevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LevelRepository::class)
 */
class Level
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $level;

    /**
     * @ORM\OneToMany(targetEntity=Tourney::class, mappedBy="level")
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

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

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
            $tourney->setLevel($this);
        }

        return $this;
    }

    public function removeTourney(Tourney $tourney): self
    {
        if ($this->tourneys->removeElement($tourney)) {
            // set the owning side to null (unless already changed)
            if ($tourney->getLevel() === $this) {
                $tourney->setLevel(null);
            }
        }

        return $this;
    }
}
