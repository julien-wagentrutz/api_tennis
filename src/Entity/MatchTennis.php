<?php

namespace App\Entity;

use App\Repository\MatchTennisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MatchTennisRepository::class)
 */
class MatchTennis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"public_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"public_read"})
     */
    private $typeMatch;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $matchTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"public_read"})
     */
    private $matchDate;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $player1RankDuringMatch;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $player2RankDuringMatch;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $player1_2RankDuringMatch;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $player2_2RankDuringMatch;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $player1PointDuringMatch;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $player2PointDuringMatch;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $player1_2PointDuringMatch;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $player2_2PointDuringMatch;

    /**
     * @ORM\OneToMany(targetEntity=Set::class, mappedBy="matchTennis")
     */
    private $sets;

    /**
     * @ORM\ManyToOne(targetEntity=Round::class, inversedBy="matchTennis")
     */
    private $round;

    /**
     * @ORM\OneToMany(targetEntity=MatchPlay::class, mappedBy="matchTennis")
     */
    private $matchPlays;

    public function __construct()
    {
        $this->sets = new ArrayCollection();
        $this->matchPlays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeMatch(): ?string
    {
        return $this->typeMatch;
    }

    public function setTypeMatch(string $typeMatch): self
    {
        $this->typeMatch = $typeMatch;

        return $this;
    }

    public function getMatchTime(): ?int
    {
        return $this->matchTime;
    }

    public function setMatchTime(?int $matchTime): self
    {
        $this->matchTime = $matchTime;

        return $this;
    }

    public function getMatchDate(): ?\DateTimeInterface
    {
        return $this->matchDate;
    }

    public function setMatchDate(?\DateTimeInterface $matchDate): self
    {
        $this->matchDate = $matchDate;

        return $this;
    }

    public function getPlayer1RankDuringMatch(): ?int
    {
        return $this->player1RankDuringMatch;
    }

    public function setPlayer1RankDuringMatch(?int $player1RankDuringMatch): self
    {
        $this->player1RankDuringMatch = $player1RankDuringMatch;

        return $this;
    }

    public function getPlayer2RankDuringMatch(): ?int
    {
        return $this->player2RankDuringMatch;
    }

    public function setPlayer2RankDuringMatch(?int $player2RankDuringMatch): self
    {
        $this->player2RankDuringMatch = $player2RankDuringMatch;

        return $this;
    }



    public function getPlayer22RankDuringMatch(): ?int
    {
        return $this->player2_2RankDuringMatch;
    }

    public function setPlayer22RankDuringMatch(?int $player2_2RankDuringMatch): self
    {
        $this->player2_2RankDuringMatch = $player2_2RankDuringMatch;

        return $this;
    }

    public function getPlayer1PointDuringMatch(): ?int
    {
        return $this->player1PointDuringMatch;
    }

    public function setPlayer1PointDuringMatch(?int $player1PointDuringMatch): self
    {
        $this->player1PointDuringMatch = $player1PointDuringMatch;

        return $this;
    }

    public function getPlayer2PointDuringMatch(): ?int
    {
        return $this->player2PointDuringMatch;
    }

    public function setPlayer2PointDuringMatch(?int $player2PointDuringMatch): self
    {
        $this->player2PointDuringMatch = $player2PointDuringMatch;

        return $this;
    }

    public function getPlayer12PointDuringMatch(): ?int
    {
        return $this->player1_2PointDuringMatch;
    }

    public function setPlayer12PointDuringMatch(?int $player1_2PointDuringMatch): self
    {
        $this->player1_2PointDuringMatch = $player1_2PointDuringMatch;

        return $this;
    }



    /**
     * @return Collection|Set[]
     */
    public function getSets(): Collection
    {
        return $this->sets;
    }

    public function addSet(Set $set): self
    {
        if (!$this->sets->contains($set)) {
            $this->sets[] = $set;
            $set->setMatchTennis($this);
        }

        return $this;
    }

    public function removeSet(Set $set): self
    {
        if ($this->sets->removeElement($set)) {
            // set the owning side to null (unless already changed)
            if ($set->getMatchTennis() === $this) {
                $set->setMatchTennis(null);
            }
        }

        return $this;
    }

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function setRound(?Round $round): self
    {
        $this->round = $round;

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
            $matchPlay->setMatchTennis($this);
        }

        return $this;
    }

    public function removeMatchPlay(MatchPlay $matchPlay): self
    {
        if ($this->matchPlays->removeElement($matchPlay)) {
            // set the owning side to null (unless already changed)
            if ($matchPlay->getMatchTennis() === $this) {
                $matchPlay->setMatchTennis(null);
            }
        }

        return $this;
    }

    public function getPlayer12RankDuringMatch(): ?int
    {
        return $this->player1_2RankDuringMatch;
    }

    public function setPlayer12RankDuringMatch(?int $player1_2RankDuringMatch): self
    {
        $this->player1_2RankDuringMatch = $player1_2RankDuringMatch;

        return $this;
    }

    public function getPlayer22PointDuringMatch(): ?int
    {
        return $this->player2_2PointDuringMatch;
    }

    public function setPlayer22PointDuringMatch(?int $player2_2PointDuringMatch): self
    {
        $this->player2_2PointDuringMatch = $player2_2PointDuringMatch;

        return $this;
    }
}
