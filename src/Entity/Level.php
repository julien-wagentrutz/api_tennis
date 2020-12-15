<?php

namespace App\Entity;

use App\Repository\LevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=LevelRepository::class)
 */
class Level
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"public_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1)
     * @Groups({"public_read"})
     */
    private $level;

    /**
     * @ORM\OneToMany(targetEntity=Tourney::class, mappedBy="level")
     */
    private $tourneys;

    /**
     * @ORM\OneToMany(targetEntity=PointRound::class, mappedBy="level")
     */
    private $pointRounds;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"public_read"})
     */
    private $label;

    public function __construct()
    {
        $this->tourneys = new ArrayCollection();
        $this->pointRounds = new ArrayCollection();
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

    /**
     * @return Collection|PointRound[]
     */
    public function getPointRounds(): Collection
    {
        return $this->pointRounds;
    }

    public function addPointRound(PointRound $pointRound): self
    {
        if (!$this->pointRounds->contains($pointRound)) {
            $this->pointRounds[] = $pointRound;
            $pointRound->setLevel($this);
        }

        return $this;
    }

    public function removePointRound(PointRound $pointRound): self
    {
        if ($this->pointRounds->removeElement($pointRound)) {
            // set the owning side to null (unless already changed)
            if ($pointRound->getLevel() === $this) {
                $pointRound->setLevel(null);
            }
        }

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }
}
