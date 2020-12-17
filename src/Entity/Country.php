<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
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
     * @ORM\OneToMany(targetEntity=Player::class, mappedBy="country")
     */
    private $players;

    /**
     * @ORM\OneToMany(targetEntity=TourneyPlay::class, mappedBy="country")
     */
    private $tourneyPlays;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->tourneyPlays = new ArrayCollection();
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

    /**
     * @return Collection|TourneyPlay[]
     */
    public function getTourneyPlays(): Collection
    {
        return $this->tourneyPlays;
    }

    public function addTourneyPlay(TourneyPlay $tourneyPlay): self
    {
        if (!$this->tourneyPlays->contains($tourneyPlay)) {
            $this->tourneyPlays[] = $tourneyPlay;
            $tourneyPlay->setContry($this);
        }

        return $this;
    }

    public function removeTourneyPlay(TourneyPlay $tourneyPlay): self
    {
        if ($this->tourneyPlays->removeElement($tourneyPlay)) {
            // set the owning side to null (unless already changed)
            if ($tourneyPlay->getContry() === $this) {
                $tourneyPlay->setContry(null);
            }
        }

        return $this;
    }
}
