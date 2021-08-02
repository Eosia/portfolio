<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SkillsController extends AbstractController
{

    private $repoSkill;
    private $repoCategorie;

    public function __construct(SkillRepository $repoSkill, CategorieRepository $repoCategorie) {
        $this->repoSkill = $repoSkill;
        $this->repoCategorie = $repoCategorie;
    }

    /**
     * @Route("/skills", name="skills")
     */
    public function index(): Response
    {

        $categories = $this->repoCategorie->findAll();

        $skill = $this->repoSkill->findAll();

        $skills = $this->repoSkill->findAll();


        return $this->render('skills/index.html.twig', [
            'skill' => $skill,
            'skills' => $skills,
            'categories' => $categories,
        ]);
    }
}
