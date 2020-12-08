<?php

namespace App\Entity;

use App\Repository\BoardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoardRepository::class)
 */
class Board
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $nbPlayer;

    /**
     * @ORM\ManyToOne(targetEntity=TourneyPlay::class, inversedBy="boards")
     */
    private $tourneyPlay;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNbPlayer(): ?int
    {
        return $this->nbPlayer;
    }

    public function setNbPlayer(?int $nbPlayer): self
    {
        $this->nbPlayer = $nbPlayer;

        return $this;
    }

    public function getTourneyPlay(): ?TourneyPlay
    {
        return $this->tourneyPlay;
    }

    public function setTourneyPlay(?TourneyPlay $tourneyPlay): self
    {
        $this->tourneyPlay = $tourneyPlay;

        return $this;
    }
}
