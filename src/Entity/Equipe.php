<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["equipe:read", "fav:read", "joueur:read", "all:read"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["equipe:read", "fav:read", "joueur:read", "all:read"])]
    private $nom;

    #[ORM\Column(type: 'integer')]
    #[Groups(["equipe:read", "fav:read", "joueur:read", "all:read"])]
    private $nbJoueur;

    #[ORM\OneToOne(targetEntity: Image::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["equipe:read", "fav:read", "joueur:read", "all:read"])]
    private $ecusson;


    public function __construct() {}


    // GETTERS & SETTERS

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

    public function getNbJoueur(): ?int
    {
        return $this->nbJoueur;
    }

    public function setNbJoueur(int $nbJoueur): self
    {
        $this->nbJoueur = $nbJoueur;

        return $this;
    }

    public function addJoueur(Joueur $joueur): self
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs[] = $joueur;
            $joueur->setEquipe($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): self
    {
        if ($this->joueurs->removeElement($joueur)) {
            // set the owning side to null (unless already changed)
            if ($joueur->getEquipe() === $this) {
                $joueur->setEquipe(null);
            }
        }

        return $this;
    }

    public function getEcusson(): ?Image
    {
        return $this->ecusson;
    }

    public function setEcusson(Image $ecusson): self
    {
        $this->ecusson = $ecusson;

        return $this;
    }

}
