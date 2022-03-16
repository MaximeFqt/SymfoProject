<?php

namespace App\Controller;

use App\Entity\Favoris;
use App\Repository\EquipeRepository;
use App\Repository\FavorisRepository;
use App\Repository\JoueurRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * ACCUEIL
     * @return Response
     */
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'currentUser' => $this->getUser()
        ]);
    }



    /**
     * AFFICHAGE DE TOUTES LES EQUIPES
     * @param ManagerRegistry $managerRegistry
     * @return Response
     */
    #[Route('/equipelist', name: 'equipe')]
    public function equipe(ManagerRegistry $managerRegistry): Response
    {
        $equipeRepo = new EquipeRepository($managerRegistry);
        $equipe = $equipeRepo->findAll();

        return $this->render('default/equipe.html.twig', [
            'equipe' => $equipe,
            'currentUser' => $this->getUser()
        ]);
    }



    /**
     * AFFICHAGE D'UNE SEULE EQUIPE
     * @param $team_id
     * @param ManagerRegistry $managerRegistry
     * @return Response
     */
    #[Route('/equipelist/{team_id}', name: 'equipeDetails')]
    public function equipeDetails($team_id, ManagerRegistry $managerRegistry): Response
    {
        $equipeRepo = new EquipeRepository($managerRegistry);
        $equipe = $equipeRepo->find($team_id);

        $joueurRepo = new JoueurRepository($managerRegistry);
        $joueurs = $joueurRepo->findAllByTeam($team_id);

        return $this->render('default/equipeDetails.html.twig', [
            'equipe' => $equipe,
            "joueurs" => $joueurs,
            'currentUser' => $this->getUser()
        ]);
    }



    /**
     * AJOUT D'UNE EQUIPE EN FAVORIS
     * @param $team_id
     * @param $user_id
     * @param ManagerRegistry $managerRegistry
     * @return Response
     */
    #[Route('/equipelist/{team_id}/{user_id}', name: 'addFav')]
    public function addFav($team_id, $user_id, ManagerRegistry $managerRegistry): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        // Récupère l'équipe
        $equipeRepo = new EquipeRepository($managerRegistry);
        $team = $equipeRepo->find($team_id);
        // Récupère l'utilisateur
        $userRepo = new UserRepository($managerRegistry);
        $user = $userRepo->find($user_id);

        // Vérifie si l'équipe n'est pas dans les favoris
        $favRepo = new FavorisRepository($managerRegistry);
        $fav = $favRepo->findFavByUser($user_id);

        for ($i = 0; $i < sizeof($fav); $i++) {
            // Déjà dans les favoris
            if ($fav[$i]->getEquipe()->getId() == $team_id) {
                // On stoppe la boucle est on redirige
                $alert = "Cette équipe (".$team->getNom().") fait déjà partie de vos favoris !";
                return $this->render('default/equipe.html.twig', [
                    'equipe' => $equipeRepo->findAll(),
                    'alert' => $alert,
                    'currentUser' => $this->getUser()
                ]);
            }
        }

        $equipe = new Favoris();
        $equipe->setEquipe($team);
        $equipe->setUser($user);
        $equipe->setDate('%d %B %Y');

        $entityManager->persist($equipe);
        $entityManager->flush();

        $alert = "L'équipe (".$team->getNom().") a été ajoutée à vos favoris !";

        return $this->redirectToRoute('equipe');
    }


    /**
     * SUPPRIME UN FAVORIS
     * @param $user_id
     * @param Favoris $fav
     * @param ManagerRegistry $managerRegistry
     * @return Response
     */
    #[Route('/mesfavoris/{user_id}/{team_id}/{fav}', name: 'deleteFav')]
    public function deleteFav($user_id, Favoris $fav, ManagerRegistry $managerRegistry): Response
    {
        $favRepo = new FavorisRepository($managerRegistry);
        $favoris = $favRepo->findFavByUser($user_id);

        $favRepo->deleteFav($fav->getId());

        $alert = "L'équipe (".$fav->getEquipe()->getNom().") a été supprimée";

        return $this->redirectToRoute("mesfavoris", ["user_id" => $user_id]);
    }



    /**
     * AFFICHAGE DES FAVORIS USER
     * @param $user_id
     * @param ManagerRegistry $managerRegistry
     * @return Response
     */
    #[Route('/mesfavoris/{user_id}', name: 'mesfavoris')]
    public function mesfavoris($user_id, ManagerRegistry $managerRegistry): Response
    {
        $favRepo = new FavorisRepository($managerRegistry);
        $fav = $favRepo->findFavByUser($user_id);
        return $this->render('default/mesfavoris.html.twig', [
            'favoris' => $fav,
            'currentUser' => $this->getUser()
        ]);
    }
}
