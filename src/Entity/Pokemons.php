<?php

namespace App\Entity;

use App\Repository\PokemonsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonsRepository::class)
 */
class Pokemons
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Evolve;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $DownEvolve;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $level_evolve;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $level_down_evolve;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $numeroPokedex;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getEvolve(): ?string
    {
        return $this->Evolve;
    }

    public function setEvolve(?string $Evolve): self
    {
        $this->Evolve = $Evolve;

        return $this;
    }

    public function getDownEvolve(): ?string
    {
        return $this->DownEvolve;
    }

    public function setDownEvolve(?string $DownEvolve): self
    {
        $this->DownEvolve = $DownEvolve;

        return $this;
    }

    public function getLevelEvolve(): ?string
    {
        return $this->level_evolve;
    }

    public function setLevelEvolve(string $level_evolve): self
    {
        $this->level_evolve = $level_evolve;

        return $this;
    }

    public function getLevelDownEvolve(): ?string
    {
        return $this->level_down_evolve;
    }

    public function setLevelDownEvolve(string $level_down_evolve): self
    {
        $this->level_down_evolve = $level_down_evolve;

        return $this;
    }

    public function getNumeroPokedex(): ?string
    {
        return $this->numeroPokedex;
    }

    public function setNumeroPokedex(string $numeroPokedex): self
    {
        $this->numeroPokedex = $numeroPokedex;

        return $this;
    }
}
