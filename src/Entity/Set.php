<?php

namespace App\Entity;

use App\Repository\SetRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SetRepository::class)
 * @ORM\Table(name="`set`")
 */
class Set
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
    private $player1Score;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $player2Score;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"public_read"})
     */
    private $timebreak;

    /**
     * @ORM\ManyToOne(targetEntity=MatchTennis::class, inversedBy="sets")
     */
    private $matchTennis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer1Score(): ?int
    {
        return $this->player1Score;
    }

    public function setPlayer1Score(?int $player1Score): self
    {
        $this->player1Score = $player1Score;

        return $this;
    }

    public function getPlayer2Score(): ?int
    {
        return $this->player2Score;
    }

    public function setPlayer2Score(?int $player2Score): self
    {
        $this->player2Score = $player2Score;

        return $this;
    }

    public function getTimebreak(): ?bool
    {
        return $this->timebreak;
    }

    public function setTimebreak(bool $timebreak): self
    {
        $this->timebreak = $timebreak;

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
