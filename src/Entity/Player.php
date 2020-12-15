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
     * @ORM\Column(type="string", length=4 ,nullable=true)
     * @Groups({"public_read"})
     */
    private $turnedProDate;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"public_read"})
     */
    private $weightLbs;

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
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @Groups({"public_read"})
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=MatchPlay::class, mappedBy="player")
     * @Groups({"read_player"})
     */
    private $matchPlays;

    /**
     * @ORM\OneToMany(targetEntity=Rank::class, mappedBy="player")
     * @Groups({"public_read"})
     */
    private $ranks;

    public function __construct()
    {
        $this->matchPlays = new ArrayCollection();
        $this->ranks = new ArrayCollection();
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
	public function getLastName()
                        	{
                        		return $this->lastName;
                        	}

	/**
	 * @param mixed $lastName
	 */
	public function setLastName($lastName): void
                        	{
                        		$this->lastName = $lastName;
                        	}

	/**
	 * @return mixed
	 */
	public function getBirthDate()
                        	{
                        		return $this->birthDate;
                        	}

	/**
	 * @param mixed $birthDate
	 */
	public function setBirthDate($birthDate): void
                        	{
                        		$this->birthDate = $birthDate;
                        	}

	/**
	 * @return mixed
	 */
	public function getTurnedProDate()
                        	{
                        		return $this->turnedProDate;
                        	}

	/**
	 * @param mixed $turnedProDate
	 */
	public function setTurnedProDate($turnedProDate): void
                        	{
                        		$this->turnedProDate = $turnedProDate;
                        	}

	/**
	 * @return mixed
	 */
	public function getWeightLbs()
                        	{
                        		return $this->weightLbs;
                        	}

	/**
	 * @param mixed $weightLbs
	 */
	public function setWeightLbs($weightLbs): void
                        	{
                        		$this->weightLbs = $weightLbs;
                        	}

	/**
	 * @return mixed
	 */
	public function getWeightKg()
                        	{
                        		return $this->weightKg;
                        	}

	/**
	 * @param mixed $weightKg
	 */
	public function setWeightKg($weightKg): void
                        	{
                        		$this->weightKg = $weightKg;
                        	}

	/**
	 * @return mixed
	 */
	public function getHeightFt()
                        	{
                        		return $this->heightFt;
                        	}

	/**
	 * @param mixed $heightFt
	 */
	public function setHeightFt($heightFt): void
                        	{
                        		$this->heightFt = $heightFt;
                        	}

	/**
	 * @return mixed
	 */
	public function getHeightM()
                        	{
                        		return $this->heightM;
                        	}

	/**
	 * @param mixed $heightM
	 */
	public function setHeightM($heightM): void
                        	{
                        		$this->heightM = $heightM;
                        	}

	/**
	 * @return mixed
	 */
	public function getBirthPlace()
                        	{
                        		return $this->birthPlace;
                        	}

	/**
	 * @param mixed $birthPlace
	 */
	public function setBirthPlace($birthPlace): void
                        	{
                        		$this->birthPlace = $birthPlace;
                        	}

	/**
	 * @return mixed
	 */
	public function getResidencePlace()
                        	{
                        		return $this->residencePlace;
                        	}

	/**
	 * @param mixed $residencePlace
	 */
	public function setResidencePlace($residencePlace): void
                        	{
                        		$this->residencePlace = $residencePlace;
                        	}

	/**
	 * @return mixed
	 */
	public function getPlayHand()
                        	{
                        		return $this->playHand;
                        	}

	/**
	 * @param mixed $playHand
	 */
	public function setPlayHand($playHand): void
                        	{
                        		$this->playHand = $playHand;
                        	}

	/**
	 * @return mixed
	 */
	public function getImgPath()
                        	{
                        		return $this->imgPath;
                        	}

	/**
	 * @param mixed $imgPath
	 */
	public function setImgPath($imgPath): void
                        	{
                        		$this->imgPath = $imgPath;
                        	}

	/**
	 * @return mixed
	 */
	public function getCoach()
                        	{
                        		return $this->coach;
                        	}

	/**
	 * @param mixed $coach
	 */
	public function setCoach($coach): void
                        	{
                        		$this->coach = $coach;
                        	}

	/**
	 * @return mixed
	 */
	public function getBackHand()
                        	{
                        		return $this->backHand;
                        	}

	/**
	 * @param mixed $backHand
	 */
	public function setBackHand($backHand): void
                        	{
                        		$this->backHand = $backHand;
                        	}

	/**
	 * @return mixed
	 */
	public function getCountry()
                        	{
                        		return $this->country;
                        	}

	/**
	 * @param mixed $country
	 */
	public function setCountry($country): void
                        	{
                        		$this->country = $country;
                        	}

	/**
	 * @return mixed
	 */
	public function getMatchPlays()
                        	{
                        		return $this->matchPlays;
                        	}

	/**
	 * @param mixed $matchPlays
	 */
	public function setMatchPlays($matchPlays): void
                        	{
                        		$this->matchPlays = $matchPlays;
                        	}

    /**
     * @return Collection|Rank[]
     */
    public function getRanks(): Collection
    {
        return $this->ranks;
    }

    public function addRank(Rank $rank): self
    {
        if (!$this->ranks->contains($rank)) {
            $this->ranks[] = $rank;
            $rank->setPlayer($this);
        }

        return $this;
    }

    public function removeRank(Rank $rank): self
    {
        if ($this->ranks->removeElement($rank)) {
            // set the owning side to null (unless already changed)
            if ($rank->getPlayer() === $this) {
                $rank->setPlayer(null);
            }
        }

        return $this;
    }

}
