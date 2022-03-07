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
