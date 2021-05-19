<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')] // peux être utliser au dépant du router.yaml dans la config...
    //si j'appel /home alors qu'il nest pas dans la config yaml, aucun soucis
    //donc je peux la supprimée si je le veux ! double emploi !
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/responseSimple', name: 'home simple')]
    public function responseSimple() : Response
    {
        return new Response("Bonjour");
    }

    #[Route('/responseJson', name: 'home simple json')]
    public function responseJson() : Response
    {
        return $this->json(["atata" => "tatat"]);
    }

    // public function __invoke() : Response
    // {
    //     return $this->json(["atata" => "tatat"]);
    // }


    
}
