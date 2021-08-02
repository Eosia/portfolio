<?php

namespace App\Controller;

use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{

    private $repoSite;

    public function __construct(SiteRepository $repoSite)
    {
        $this->repoSite = $repoSite;
    }

    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function index(): Response
    {

        $site = $this->repoSite->findAll();

        $sites = $this->repoSite->findAll();




        return $this->render('portfolio/index.html.twig', [
            'site' => $site,
            'sites' => $sites,
        ]);
    }
}
