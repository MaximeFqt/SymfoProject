<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: JoueurRepository::class)]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["joueur:read", "all:read"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["joueur:read", "all:read"])]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["joueur:read", "all:read"])]
    private $nationnalite;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["joueur:read", "all:read"])]
    private $poste;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(["joueur:read", "all:read"])]
    private $numero;

    #[ORM\ManyToOne(targetEntity: Equipe::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["joueur:read", "all:read"])]
    private $equipe;


    /**
     * @param $nom
     * @param $nationnalite
     * @param $poste
     * @param $numero
     */
    public function __construct($nom, $nationnalite, $poste, $numero, $equipe)
    {
        $this->nom = $nom;
        $this->nationnalite = $nationnalite;
        $this->poste = $poste;
        $this->numero = $numero;
        $this->equipe = $equipe;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNationnalite(): ?string
    {
        return $this->nationnalite;
    }

    public function setNationnalite(string $nationnalite): self
    {
        $this->nationnalite = $nationnalite;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * @return Equipe
     */
    public function getEquipe(): Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }
}
