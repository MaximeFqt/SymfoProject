<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Image;
use App\Entity\Joueur;
use App\Repository\EquipeRepository;
use App\Repository\FavorisRepository;
use App\Repository\ImageRepository;
use App\Repository\JoueurRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{

                                                /* *********************
                                                 ENVOIE DE DONNEES JSON
                                                ********************* */

    #[Route('/apiAll', name: 'apiAll', methods: 'GET')]
    public function getAllApi(  EquipeRepository $equipeRepository,
                                JoueurRepository $joueurRepository,
                                FavorisRepository $favorisRepository,
                                UserRepository $userRepository,
                                ImageRepository $imageRepository) {

        $json   = $equipeRepository ->findAll();
        $json[] = $joueurRepository ->findAll();
        $json[] = $favorisRepository->findAll();
        $json[] = $userRepository   ->findAll();
        $json[] = $imageRepository  ->findAll();

        return $this->json(
            $json,
            200, [],
            ["groups" => "all:read"]
        );

    }

    #[Route('/apiEquipe', name: 'apiEquipe', methods: 'GET')]
    public function getEquipeApi(EquipeRepository $repository): Response
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

    #[Route('/apiJoueur', name: 'apiJoueur', methods: 'GET')]
    public function getJoueurApi(JoueurRepository $repository): Response
    {
        return $this->json(
            $repository->findAll(),
            200, [],
            ["groups" => "joueur:read"]
        );
    }

    #[Route('/apiImage', name: 'apiImage', methods: 'GET')]
    public function getImageApi(ImageRepository $repository): Response
    {
        return $this->json(
            $repository->findAll(),
            200, [],
            ["groups" => "image:read"]
        );
    }

    #[Route('/apiUser', name: 'apiUser', methods: 'GET')]
    public function getUserApi(UserRepository $repository): Response
    {
        return $this->json(
            $repository->findAll(),
            200, [],
            ["groups" => "user:read"]
        );
    }

    #[Route('/apiFav', name: 'apiFav', methods: 'GET')]
    public function getFavApi(FavorisRepository $repository): Response
    {
        return $this->json(
            $repository->findAll(),
            200, [],
            ["groups" => "fav:read"]
        );
    }

                                                /* ********************
                                                 RECEP DE DONNEES JSON
                                                ******************** */

    // Envoie de json qui va être convertis dans la bdd
    #[Route('/apiPostEquipe', name: 'apiPostEquipe', methods: 'POST')]
    public function createEquipe(Request $request, SerializerInterface $serializer, EntityManagerInterface $em) {

        // récupère la requête json
        $jsonRecu = $request->getContent();

        try {
            // Transforme en objet de la classe Equipe
            $post = $serializer->deserialize($jsonRecu, Equipe::class, 'json');
            $em->persist($post); $em->flush();
            return $this->json($post, 201, [], ['groups' => "equipe:read"]);
        } catch (NotEncodableValueException $e) {
            // Si une erreur est reçu, on envoie un message
            return $this->json([
                'status'  => 400, // Indique qu'il y a une erreur de formatage
                'message' => $e->getMessage()
            ]);
        }
    }

    // PROBLEME A CAUSE DU CONSTRUCTEUR !! -> rendu possible que si API trouvé
    #[Route('/apiPostJoueur', name: 'apiPostJoueur', methods: 'POST')]
    public function createJoueur(Request $request, SerializerInterface $serializer, EntityManagerInterface $em) {

        // récupère la requête json
        $jsonRecu = $request->getContent();

        try {
            // Transforme en objet de la classe Joueur
            $post = $serializer->deserialize($jsonRecu, Joueur::class, 'json');
            $em->persist($post); $em->flush();
            return $this->json($post, 201, [], ['groups' => "joueur:read"]);
        } catch (NotEncodableValueException $e) {
            // Si une erreur est reçu, on envoie un message
            return $this->json([
                'status'  => 400, // Indique qu'il y a une erreur de formatage
                'message' => $e->getMessage()
            ]);
        }
    }

    #[Route('/apiPostImage', name: 'apiPostImage', methods: 'POST')]
    public function createImage(Request $request, SerializerInterface $serializer, EntityManagerInterface $em) {

        // récupère la requête json
        $jsonRecu = $request->getContent();

        try {
            // Transforme en objet de la classe Image
            $post = $serializer->deserialize($jsonRecu, Image::class, 'json');
            $em->persist($post); $em->flush();
            return $this->json($post, 201, [], ['groups' => "image:read"]);
        } catch (NotEncodableValueException $e) {
            // Si une erreur est reçu, on envoie un message
            return $this->json([
                'status'  => 400, // Indique qu'il y a une erreur de formatage
                'message' => $e->getMessage()
            ]);
        }
    }

}
