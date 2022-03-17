<?php

namespace App\Entity;

use App\Repository\FavorisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: FavorisRepository::class)]
class Favoris
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("fav:read")]
    private $id;

    #[ORM\OneToOne(targetEntity: Equipe::class, cascade: ['persist', 'remove'])]
    #[Groups("fav:read")]
    private $equipe;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'favoris')]
    #[Groups("fav:read")]
    private $user;

    #[ORM\Column(type: 'text')]
    #[Groups("fav:read")]
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        setlocale(LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
        date_default_timezone_set('Europe/Paris');
        $this->date = utf8_encode(strftime($date));

        return $this;
    }
}
