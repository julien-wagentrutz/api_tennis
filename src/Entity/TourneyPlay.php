<?php

namespace App\Entity;

use App\Repository\TourneyPlayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TourneyPlayRepository::class)
 */
class TourneyPlay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"public_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $edition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"public_read"})
     */
    private $dotation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"public_read"})
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"public_read"})
     */
    private $endDate;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"public_read"})
     */
    private $outdoor;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"public_read"})
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Groups({"public_read"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"public_read"})
     */
    private $place;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="tourneyPlays")
     * @Groups({"public_read"})
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=Tourney::class, inversedBy="tourneyPlays")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read_player","read_match","read_board"})
     */
    private $tourney;

    /**
     * @ORM\OneToMany(targetEntity=Board::class, mappedBy="tourneyPlay")
     * @Groups({"read_tourney", "read_tourneyPlay"})
     */
    private $boards;

    public function __construct()
    {
        $this->boards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEdition(): ?int
    {
        return $this->edition;
    }

    public function setEdition(?int $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getDotation(): ?string
    {
        return $this->dotation;
    }

    public function setDotation(?string $dotation): self
    {
        $this->dotation = $dotation;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getOutdoor(): ?bool
    {
        return $this->outdoor;
    }

    public function setOutdoor(bool $outdoor): self
    {
        $this->outdoor = $outdoor;

        return $this;
    }

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function setSurface(?string $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(?string $place): self
    {
        $this->place = $place;

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

    public function getTourney(): ?Tourney
    {
        return $this->tourney;
    }

    public function setTourney(?Tourney $tourney): self
    {
        $this->tourney = $tourney;

        return $this;
    }

    /**
     * @return Collection|Board[]
     */
    public function getBoards(): Collection
    {
        return $this->boards;
    }

    public function addBoard(Board $board): self
    {
        if (!$this->boards->contains($board)) {
            $this->boards[] = $board;
            $board->setTournayPlay($this);
        }

        return $this;
    }

    public function removeBoard(Board $board): self
    {
        if ($this->boards->removeElement($board)) {
            // set the owning side to null (unless already changed)
            if ($board->getTournayPlay() === $this) {
                $board->setTournayPlay(null);
            }
        }

        return $this;
    }
}
