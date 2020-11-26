<?php

namespace App\Entity;

use App\Repository\TourneyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TourneyRepository::class)
 */
class Tourney
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $tourneyStartDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $tourneyEndDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $outdoor;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bestOf3;

    /**
     * @ORM\ManyToOne(targetEntity=Contry::class, inversedBy="tourneys")
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=Surface::class, inversedBy="tourneys")
     */
    private $surface;

    /**
     * @ORM\ManyToOne(targetEntity=Draw::class, inversedBy="tourneys")
     */
    private $draw;

    /**
     * @ORM\ManyToOne(targetEntity=Level::class, inversedBy="tourneys")
     */
    private $level;

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

    public function getTourneyStartDate(): ?\DateTimeInterface
    {
        return $this->tourneyStartDate;
    }

    public function setTourneyStartDate(?\DateTimeInterface $tourneyStartDate): self
    {
        $this->tourneyStartDate = $tourneyStartDate;

        return $this;
    }

    public function getTourneyEndDate(): ?\DateTimeInterface
    {
        return $this->tourneyEndDate;
    }

    public function setTourneyEndDate(?\DateTimeInterface $tourneyEndDate): self
    {
        $this->tourneyEndDate = $tourneyEndDate;

        return $this;
    }

    public function getOutdoor(): ?bool
    {
        return $this->outdoor;
    }

    public function setOutdoor(?bool $outdoor): self
    {
        $this->outdoor = $outdoor;

        return $this;
    }

    public function getBestOf3(): ?bool
    {
        return $this->bestOf3;
    }

    public function setBestOf3(?bool $bestOf3): self
    {
        $this->bestOf3 = $bestOf3;

        return $this;
    }

    public function getCountry(): ?Contry
    {
        return $this->country;
    }

    public function setCountry(?Contry $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getSurface(): ?Surface
    {
        return $this->surface;
    }

    public function setSurface(?Surface $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getDraw(): ?Draw
    {
        return $this->draw;
    }

    public function setDraw(?Draw $draw): self
    {
        $this->draw = $draw;

        return $this;
    }

    public function getLevel(): ?Level
    {
        return $this->level;
    }

    public function setLevel(?Level $level): self
    {
        $this->level = $level;

        return $this;
    }
}
