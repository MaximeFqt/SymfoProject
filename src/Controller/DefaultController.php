<?php

namespace App\Controller;

use App\Repository\EquipeRepository;
use App\Repository\JoueurRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/equipelist', name: 'equipe')]
    public function equipe(ManagerRegistry $managerRegistry): Response
    {
        $equipeRepo = new EquipeRepository($managerRegistry);
        $equipe = $equipeRepo->findAll();
        return $this->render('default/equipe.html.twig', [
            'equipe' => $equipe
        ]);
    }

    #[Route('/equipelist/{id}', name: 'equipeDetails')]
    public function detailsEquipe($id, ManagerRegistry $managerRegistry): Response
    {
        $equipeRepo = new EquipeRepository($managerRegistry);
        $equipe = $equipeRepo->find($id);

        $joueurRepo = new JoueurRepository($managerRegistry);
        $joueurs = $joueurRepo->findAllByTeam($id);

        return $this->render('default/equipeDetails.html.twig', [
            'equipe' => $equipe,
            "joueurs" => $joueurs
        ]);
    }

    #[Route('/edit', name: 'edit')]
    public function edit(ManagerRegistry $managerRegistry): Response
    {
        $equipeRepo = new EquipeRepository($managerRegistry);
        $equipe = $equipeRepo->findAll();
        return $this->render('default/edit.html.twig', [
            'equipe' => $equipe
        ]);
    }
}
