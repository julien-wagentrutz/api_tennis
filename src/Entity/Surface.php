<?php

namespace App\Entity;

use App\Repository\SurfaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SurfaceRepository::class)
 */
class Surface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"public_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups({"public_read"})
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity=Tourney::class, mappedBy="surface")
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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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
            $tourney->setSurface($this);
        }

        return $this;
    }

    public function removeTourney(Tourney $tourney): self
    {
        if ($this->tourneys->removeElement($tourney)) {
            // set the owning side to null (unless already changed)
            if ($tourney->getSurface() === $this) {
                $tourney->setSurface(null);
            }
        }

        return $this;
    }
}
