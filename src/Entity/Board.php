<?php

namespace App\Entity;

use App\Repository\BoardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BoardRepository::class)
 */
class Board
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
    private $type;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $nbPlayer;

    /**
     * @ORM\ManyToOne(targetEntity=TourneyPlay::class, inversedBy="boards")
     * @Groups({"read_player","read_board"})
     */
    private $tourneyPlay;

    /**
     * @ORM\OneToMany(targetEntity=MatchTennis::class, mappedBy="board")
     * @Groups ({"read_tourney","read_board","read_tourneyPlay"})
     */
    private $matchTennis;

    public function __construct()
    {
        $this->matchTennis = new ArrayCollection();
    }



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

    /**
     * @return Collection|MatchTennis[]
     */
    public function getMatchTennis(): Collection
    {
        return $this->matchTennis;
    }

    public function addMatchTenni(MatchTennis $matchTenni): self
    {
        if (!$this->matchTennis->contains($matchTenni)) {
            $this->matchTennis[] = $matchTenni;
            $matchTenni->setBoard($this);
        }

        return $this;
    }

    public function removeMatchTenni(MatchTennis $matchTenni): self
    {
        if ($this->matchTennis->removeElement($matchTenni)) {
            // set the owning side to null (unless already changed)
            if ($matchTenni->getBoard() === $this) {
                $matchTenni->setBoard(null);
            }
        }

        return $this;
    }


}
