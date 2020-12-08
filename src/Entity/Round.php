<?php

namespace App\Entity;

use App\Repository\RoundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RoundRepository::class)
 */
class Round
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"public_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=4)
     * @Groups({"public_read"})
     */
    private $round;

    /**
     * @ORM\OneToMany(targetEntity=MatchTennis::class, mappedBy="round")
     */
    private $matchTennis;

    /**
     * @ORM\OneToMany(targetEntity=PointRound::class, mappedBy="round")
     */
    private $pointRounds;

    public function __construct()
    {
        $this->matchTennis = new ArrayCollection();
        $this->pointRounds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRound(): ?string
    {
        return $this->round;
    }

    public function setRound(string $round): self
    {
        $this->round = $round;

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
            $matchTenni->setRound($this);
        }

        return $this;
    }

    public function removeMatchTenni(MatchTennis $matchTenni): self
    {
        if ($this->matchTennis->removeElement($matchTenni)) {
            // set the owning side to null (unless already changed)
            if ($matchTenni->getRound() === $this) {
                $matchTenni->setRound(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PointRound[]
     */
    public function getPointRounds(): Collection
    {
        return $this->pointRounds;
    }

    public function addPointRound(PointRound $pointRound): self
    {
        if (!$this->pointRounds->contains($pointRound)) {
            $this->pointRounds[] = $pointRound;
            $pointRound->setRound($this);
        }

        return $this;
    }

    public function removePointRound(PointRound $pointRound): self
    {
        if ($this->pointRounds->removeElement($pointRound)) {
            // set the owning side to null (unless already changed)
            if ($pointRound->getRound() === $this) {
                $pointRound->setRound(null);
            }
        }

        return $this;
    }
}
