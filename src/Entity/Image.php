<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert; // Permet l'ajout de contrainte de validation

#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[Vich\Uploadable]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["equipe:read", "image:read", "fav:read", "joueur:read", "all:read"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["equipe:read", "image:read", "fav:read", "joueur:read", "all:read"])]
    #[Assert\NotBlank]
    private $nom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(["equipe:read", "image:read", "fav:read", "joueur:read", "all:read"])]
    #[Assert\NotBlank]
    private $url;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var File|null
     */
    #[Vich\UploadableField(mapping:"image", fileNameProperty:"url")]
    private $imageFile;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updatedAt;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $image = null): self
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if (null != $image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getUrl();
    }


}
