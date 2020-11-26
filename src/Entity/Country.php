<?php

namespace App\Entity;

use App\Repository\ContryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ContryRepository::class)
 */
class Country
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"public_read"})
     */
    private $fullName;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $numericCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups({"public_read"})
     */
    private $flagPath;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     * @Groups({"public_read"})
     */
    private $iso2;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     * @Groups({"public_read"})
     */
    private $iso3;

    /**
     * @ORM\OneToMany(targetEntity=Tourney::class, mappedBy="country")
     * @Groups({"public_read"})
     */
    private $tourneys;

    /**
     * @ORM\OneToMany(targetEntity=Player::class, mappedBy="country")
     */
    private $players;

    public function __construct()
    {
        $this->tourneys = new ArrayCollection();
        $this->players = new ArrayCollection();
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getNumericCode(): ?int
    {
        return $this->numericCode;
    }

    public function setNumericCode(?int $numericCode): self
    {
        $this->numericCode = $numericCode;

        return $this;
    }

    public function getIso2(): ?string
    {
        return $this->iso2;
    }

    public function setIso2(?string $iso2): self
    {
        $this->iso2 = $iso2;

        return $this;
    }

    public function getIso3(): ?string
    {
        return $this->iso3;
    }

    public function setIso3(?string $iso3): self
    {
        $this->iso3 = $iso3;

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
            $tourney->setCountry($this);
        }

        return $this;
    }

    public function removeTourney(Tourney $tourney): self
    {
        if ($this->tourneys->removeElement($tourney)) {
            // set the owning side to null (unless already changed)
            if ($tourney->getCountry() === $this) {
                $tourney->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Player[]
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->players->contains($player)) {
            $this->players[] = $player;
            $player->setCountry($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getCountry() === $this) {
                $player->setCountry(null);
            }
        }

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFlagPath(): ?string
    {
        return $this->flagPath;
    }

    public function setFlagPath(?string $flagPath): self
    {
        $this->flagPath = $flagPath;

        return $this;
    }
}
