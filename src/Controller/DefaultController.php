<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Favoris;
use App\Entity\Image;
use App\Form\EquipeType;
use App\Form\ImageType;
use App\Repository\ArticleRepository;
use App\Repository\EquipeRepository;
use App\Repository\FavorisRepository;
use App\Repository\JoueurRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $articleRepo = new ArticleRepository($managerRegistry);
        $article = $articleRepo->findAll();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'articles' => $article,
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
     * @param ManagerRegistry $managerRegistry
     * @return Response
     */
    #[Route('/equipelist/{team_id}/add', name: 'addFav')]
    #[IsGranted("ROLE_USER")]
    public function addFav($team_id, ManagerRegistry $managerRegistry, Request $request): Response
    {
        $user_id = $this->getUser()->getId();

        $entityManager = $this->getDoctrine()->getManager();

        // R??cup??re l'??quipe
        $equipeRepo = new EquipeRepository($managerRegistry);
        $team = $equipeRepo->find($team_id);
        // R??cup??re l'utilisateur
        $userRepo = new UserRepository($managerRegistry);
        $user = $userRepo->find($user_id);

        // V??rifie si l'??quipe n'est pas dans les favoris
        $favRepo = new FavorisRepository($managerRegistry);
        $fav = $favRepo->findFavByUser($user_id);

        for ($i = 0; $i < sizeof($fav); $i++) {
            // D??j?? dans les favoris
            if ($fav[$i]->getEquipe()->getId() == $team_id) {
                // On stoppe la boucle est on redirige

                $request->getSession()->set("alert", "Cette ??quipe (".$team->getNom().") fait d??j?? partie de vos favoris !");

                return $this->redirectToRoute('equipe');
            }
        }

        $request->getSession()->set("alert", "Ajout de ".$team->getNom()." dans vos favoris !");

        $equipe = new Favoris();
        $equipe->setEquipe($team);
        $equipe->setUser($user);
        $equipe->setDate('%d %B %Y');

        $entityManager->persist($equipe);
        $entityManager->flush();

        return $this->redirectToRoute('equipe');
    }


    /**
     * SUPPRIME UN FAVORIS
     * @param Favoris $fav
     * @param ManagerRegistry $managerRegistry
     * @return Response
     */
    #[Route('/mesfavoris/{team_id}/{fav}', name: 'deleteFav')]
    #[IsGranted("ROLE_USER")]
    public function deleteFav(Favoris $fav, ManagerRegistry $managerRegistry, Request $request): Response
    {
        $user_id = $this->getUser()->getId();

        $favRepo = new FavorisRepository($managerRegistry);
        $favRepo->deleteFav($fav->getId());

        $request->getSession()->set("alert", "L'??quipe ".$fav->getEquipe()->getNom()." n'est plus dans vos favoris !");

        return $this->redirectToRoute("mesfavoris", ["user_id" => $user_id]);
    }



    /**
     * AFFICHAGE DES FAVORIS USER
     * @param ManagerRegistry $managerRegistry
     * @return Response
     */
    #[Route('/mesfavoris', name: 'mesfavoris')]
    #[IsGranted("ROLE_USER")]
    public function mesfavoris(ManagerRegistry $managerRegistry, Request $request): Response
    {
        $user_id = $this->getUser()->getId();

        $favRepo = new FavorisRepository($managerRegistry);
        $fav = $favRepo->findFavByUser($user_id);
        return $this->render('default/mesfavoris.html.twig', [
            'favoris' => $fav,
            'currentUser' => $this->getUser()
        ]);
    }

}
