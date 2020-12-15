<?php

namespace App\Entity;

use App\Repository\TourneyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TourneyRepository::class)
 */
class Tourney
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
     * @ORM\ManyToOne(targetEntity=Level::class, inversedBy="tourneys")
     * @Groups({"public_read"})
     */
    private $level;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"public_read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"public_read"})
     */
    private $pathLogo;

    /**
     * @ORM\OneToMany(targetEntity=TourneyPlay::class, mappedBy="tourney")
     * @Groups({"read_tourney"})
     */
    private $tourneyPlays;

    public function __construct()
    {
        $this->tourneyPlays = new ArrayCollection();
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPathLogo(): ?string
    {
        return $this->pathLogo;
    }

    public function setPathLogo(?string $pathLogo): self
    {
        $this->pathLogo = $pathLogo;

        return $this;
    }

	/**
	 * @return mixed
	 */
	public function getId()
                        	{
                        		return $this->id;
                        	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void
                        	{
                        		$this->id = $id;
                        	}

	/**
	 * @return mixed
	 */
	public function getName()
                        	{
                        		return $this->name;
                        	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): void
                        	{
                        		$this->name = $name;
                        	}

	/**
	 * @return mixed
	 */
	public function getLevel()
                        	{
                        		return $this->level;
                        	}

	/**
	 * @param mixed $level
	 */
	public function setLevel($level): void
                        	{
                        		$this->level = $level;
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
            $tourneyPlay->setTourney($this);
        }

        return $this;
    }

    public function removeTourneyPlay(TourneyPlay $tourneyPlay): self
    {
        if ($this->tourneyPlays->removeElement($tourneyPlay)) {
            // set the owning side to null (unless already changed)
            if ($tourneyPlay->getTourney() === $this) {
                $tourneyPlay->setTourney(null);
            }
        }

        return $this;
    }

}
