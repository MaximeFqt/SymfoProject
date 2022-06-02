<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Equipe;
use App\Entity\Image;
use App\Entity\Joueur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted("ROLE_ADMIN")]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
         return $this->render('admin/admin.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SymfoProject');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Equipe'   , 'fas fa-list', Equipe::class);
        yield MenuItem::linkToCrud('Joueur'   , 'fas fa-list', Joueur::class);
        yield MenuItem::linkToCrud('Image'    , 'fas fa-list', Image::class );
        yield MenuItem::linkToCrud('Articles' , 'fas fa-list', Article::class );
        yield MenuItem::linktoRoute('Retour au site', 'fa fa-home', 'accueil');

    }
}
