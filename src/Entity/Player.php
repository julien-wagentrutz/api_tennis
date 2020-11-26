<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"public_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"public_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"public_read"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"public_read"})
     */
    private $birthDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"public_read"})
     */
    private $turnedProDate;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $weight;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $weightKg;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $heightFt;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $heightM;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"public_read"})
     */
    private $birthPlace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"public_read"})
     */
    private $residencePlace;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     * @Groups({"public_read"})
     */
    private $playHand;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups({"public_read"})
     */
    private $imgPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"public_read"})
     */
    private $coach;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"public_read"})
     */
    private $backHand;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="players")
     * @Groups({"read_player"})
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=MatchPlay::class, mappedBy="player")
     * @Groups({"read_player"})
     */
    private $matchPlays;

    public function __construct()
    {
        $this->matchPlays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getTurnedProDate(): ?\DateTimeInterface
    {
        return $this->turnedProDate;
    }

    public function setTurnedProDate(?\DateTimeInterface $turnedProDate): self
    {
        $this->turnedProDate = $turnedProDate;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getWeightKg(): ?int
    {
        return $this->weightKg;
    }

    public function setWeightKg(?int $weightKg): self
    {
        $this->weightKg = $weightKg;

        return $this;
    }

    public function getHeightFt(): ?int
    {
        return $this->heightFt;
    }

    public function setHeightFt(?int $heightFt): self
    {
        $this->heightFt = $heightFt;

        return $this;
    }

    public function getHeightM(): ?int
    {
        return $this->heightM;
    }

    public function setHeightM(?int $heightM): self
    {
        $this->heightM = $heightM;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    public function setBirthPlace(?string $birthPlace): self
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    public function getResidencePlace(): ?string
    {
        return $this->residencePlace;
    }

    public function setResidencePlace(?string $residencePlace): self
    {
        $this->residencePlace = $residencePlace;

        return $this;
    }

    public function getPlayHand(): ?string
    {
        return $this->playHand;
    }

    public function setPlayHand(?string $playHand): self
    {
        $this->playHand = $playHand;

        return $this;
    }

    public function getCoach(): ?string
    {
        return $this->coach;
    }

    public function setCoach(?string $coach): self
    {
        $this->coach = $coach;

        return $this;
    }

    public function getBackHand(): ?bool
    {
        return $this->backHand;
    }

    public function setBackHand(?bool $backHand): self
    {
        $this->backHand = $backHand;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|MatchPlay[]
     */
    public function getMatchPlays(): Collection
    {
        return $this->matchPlays;
    }

    public function addMatchPlay(MatchPlay $matchPlay): self
    {
        if (!$this->matchPlays->contains($matchPlay)) {
            $this->matchPlays[] = $matchPlay;
            $matchPlay->setPlayer($this);
        }

        return $this;
    }

    public function removeMatchPlay(MatchPlay $matchPlay): self
    {
        if ($this->matchPlays->removeElement($matchPlay)) {
            // set the owning side to null (unless already changed)
            if ($matchPlay->getPlayer() === $this) {
                $matchPlay->setPlayer(null);
            }
        }

        return $this;
    }

    public function getImgPath(): ?string
    {
        return $this->imgPath;
    }

    public function setImgPath(?string $imgPath): self
    {
        $this->imgPath = $imgPath;

        return $this;
    }
}
