<?php

namespace App\Entity;

use App\Repository\MatchPlayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatchPlayRepository::class)
 */
class MatchPlay
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
    private $resultat;

    /**
     * @ORM\Column(type="smallint")
     */
    private $doubleFaults;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ace;

    /**
     * @ORM\Column(type="smallint")
     */
    private $totalService;

    /**
     * @ORM\Column(type="smallint")
     */
    private $totalFirstService;

    /**
     * @ORM\Column(type="smallint")
     */
    private $firstServeWon;

    /**
     * @ORM\Column(type="smallint")
     */
    private $secondServeWon;

    /**
     * @ORM\Column(type="smallint")
     */
    private $totalBreakPoints;

    /**
     * @ORM\Column(type="smallint")
     */
    private $breakPointSave;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class, inversedBy="matchPlays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity=MatchTennis::class, inversedBy="matchPlays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matchTennis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResultat(): ?string
    {
        return $this->resultat;
    }

    public function setResultat(string $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }

    public function getDoubleFaults(): ?int
    {
        return $this->doubleFaults;
    }

    public function setDoubleFaults(int $doubleFaults): self
    {
        $this->doubleFaults = $doubleFaults;

        return $this;
    }

    public function getAce(): ?int
    {
        return $this->ace;
    }

    public function setAce(int $ace): self
    {
        $this->ace = $ace;

        return $this;
    }

    public function getTotalService(): ?int
    {
        return $this->totalService;
    }

    public function setTotalService(int $totalService): self
    {
        $this->totalService = $totalService;

        return $this;
    }

    public function getTotalFirstService(): ?int
    {
        return $this->totalFirstService;
    }

    public function setTotalFirstService(int $totalFirstService): self
    {
        $this->totalFirstService = $totalFirstService;

        return $this;
    }

    public function getFirstServeWon(): ?int
    {
        return $this->firstServeWon;
    }

    public function setFirstServeWon(int $firstServeWon): self
    {
        $this->firstServeWon = $firstServeWon;

        return $this;
    }

    public function getSecondServeWon(): ?int
    {
        return $this->secondServeWon;
    }

    public function setSecondServeWon(int $secondServeWon): self
    {
        $this->secondServeWon = $secondServeWon;

        return $this;
    }

    public function getTotalBreakPoints(): ?int
    {
        return $this->totalBreakPoints;
    }

    public function setTotalBreakPoints(int $totalBreakPoints): self
    {
        $this->totalBreakPoints = $totalBreakPoints;

        return $this;
    }

    public function getBreakPointSave(): ?int
    {
        return $this->breakPointSave;
    }

    public function setBreakPointSave(int $breakPointSave): self
    {
        $this->breakPointSave = $breakPointSave;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function getMatchTennis(): ?MatchTennis
    {
        return $this->matchTennis;
    }

    public function setMatchTennis(?MatchTennis $matchTennis): self
    {
        $this->matchTennis = $matchTennis;

        return $this;
    }

}
