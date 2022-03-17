<?php

namespace App\Controller;

use App\Entity\Image;
use App\Repository\EquipeRepository;
use App\Repository\FavorisRepository;
use App\Repository\ImageRepository;
use App\Repository\JoueurRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{

    // OK
    #[Route('/apiEquipe', name: 'apiEquipe', methods: 'GET')]
    public function getEquipeApi(EquipeRepository $repository, SerializerInterface $serializer): Response
    {
        /*
        // Transforme un objet sous forme de tableau associatif
        $equipeNormalize = $normalizer->normalize($repository->findAll(), null, ['groups' => 'equipe:read']);
        // Encode en json
        $equipejson = json_encode($equipeNormalize);
        */

        /*
        // Transformation d'objet sous forme de tableau associatif puis met au format json
        $equipejson = $serializer->serialize($repository->findAll(), 'json', ['groups' => 'equipe:read']);
        */

        // Transforme, fait une JsonResponse et retourne le json
        return $this->json(
            $repository->findAll(),
            200, [],
            ["groups" => "equipe:read"]
        );

    }

    // Probleme avec Equipe
    #[Route('/apiJoueur', name: 'apiJoueur', methods: 'GET')]
    public function getJoueurApi(JoueurRepository $repository, SerializerInterface $serializer): Response
    {
        return $this->json(
            $repository->findAll(),
            200, [],
            ["groups" => "joueur:read"]
        );
    }

    // OK
    #[Route('/apiImage', name: 'apiImage', methods: 'GET')]
    public function getImageApi(ImageRepository $repository, SerializerInterface $serializer): Response
    {
        return $this->json(
            $repository->findAll(),
            200, [],
            ["groups" => "image:read"]
        );
    }

    // OK
    #[Route('/apiUser', name: 'apiUser', methods: 'GET')]
    public function getUserApi(UserRepository $repository, SerializerInterface $serializer): Response
    {
        return $this->json(
            $repository->findAll(),
            200, [],
            ["groups" => "user:read"]
        );
    }

    // OK
    #[Route('/apiFav', name: 'apiFav', methods: 'GET')]
    public function getFavApi(FavorisRepository $repository, SerializerInterface $serializer): Response
    {
        return $this->json(
            $repository->findAll(),
            200, [],
            ["groups" => "fav:read"]
        );
    }

}
