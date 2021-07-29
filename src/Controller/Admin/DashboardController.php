<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Site;
use App\Entity\Skill;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(SiteCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Eosia Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('--- Raccourcis ---');
        yield MenuItem::linkToUrl('Retour au site', 'fa fa-globe', '/');
        yield MenuItem::linkToUrl('Déconnexion', 'fas fa-sign-out-alt', 'admin/logout');

        yield MenuItem::section('--- Skills ---', 'fas fa-code');
        yield MenuItem::linkToCrud('Catégorie', 'fas fa-folder-open', Categorie::class);
        yield MenuItem::linkToCrud('Language', 'fab fa-html5', Skill::class);

        yield MenuItem::section('--- Portfolio ---', 'fas fa-window-restore');
        yield MenuItem::linkToCrud('Sites', 'fab fa-chrome', Site::class);

        yield MenuItem::section('--- Administrateurs ---', 'fas fa-users');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user-circle', User::class);


    }
}
