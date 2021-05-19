<?php

namespace App\Controller;

use App\Entity\Pokemons;
use App\Form\PokemonsType;
use App\Repository\PokemonsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonsController extends AbstractController
{

    #[Route('/pokemons', name: 'pokemons', methods : ["GET"])]

    public function index(PokemonsRepository $repo): Response
    {
        $allPkns = $repo->findAll();

        return $this->render('pokemons/index.html.twig', compact('allPkns'));
    }

    #[Route('/pokemons/createV1', name: 'pokemonsCreateV1', methods : ["POST", "GET"])]
    public function createV1(Request $request, EntityManagerInterface $em): Response
    {

        if($request->isMethod("POST"))
        {
            $dataForm = $request->request->all();

            if($this->isCsrfTokenValid("PokemonCreate", $dataForm["_token"]))
            {
                $pokemon = new Pokemons;
                $pokemon->setName($dataForm["Name"]);
                $pokemon->setType($dataForm["Type"]);
                $pokemon->setNumeroPokedex($dataForm["numeroPokedex"]);
                
                $em->persist($pokemon);
                $em->flush();
                return $this->redirectToRoute('pokemon_details_v2', ['id' => $pokemon->getId() ] );
            }
            else
            {
                return $this->render('pokemons/createV1.html.twig');
            }
        }
        else
        {
            return $this->render('pokemons/createV1.html.twig');
        }
    }


    #[Route('/pokemons/createV2', name: 'pokemonsCreateV2', methods : ["POST", "GET"])]
    public function createV2(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createFormBuilder()
            ->add("Name", TextType::class)
            ->add("Type", TextType::class)
            ->add("numeroPokedex", TextType::class)
            ->add("Submit", SubmitType::class, ["label" => "Create Pokemon"])
            ->getForm()
        ;


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $tmp = $form->getData();

            $pokemon = new Pokemons;
            $pokemon->setName($tmp["Name"]);
            $pokemon->setType($tmp["Type"]);
            $pokemon->setNumeroPokedex($tmp["numeroPokedex"]);

            $em->persist($pokemon);
            $em->flush();

            return $this->redirectToRoute("pokemons");
        }

        return $this->render('pokemons/createV2.html.twig', [ 'form' => $form->createView()]);


    }


    #[Route('/pokemons/createV3', name: 'pokemonsCreateV3', methods : ["POST", "GET"])]
    public function createV3(Request $request, EntityManagerInterface $em): Response
    {
        //$data = ["Name" => "Le nom du pokemon à ajouter", "Type" => "Et son type"];
        
        $pokemon = new Pokemons;

        $form = $this->createFormBuilder($pokemon)
            ->add("Name", TextType::class, [
                "attr" => ['class' => "form-control"]
                ])

            ->add("Type", TextType::class, [
                "attr" => ["class" => "form-control"]
                ])
            ->add("numeroPokedex", TextType::class, [
                "attr" => ["class" => "form-control"]
                ])

            ->add("Submit", SubmitType::class, ["label" => "Create Pokemon"])
            ->getForm()
        ;


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($pokemon);
            $em->flush();

            return $this->redirectToRoute("pokemons");
        }

        return $this->render('pokemons/createV3.html.twig', [ 'form' => $form->createView()]);
    }


    
    #[Route('/pokemons/createV4', name: 'pokemonsCreateV4', methods : ["POST", "GET"])]
    public function createV4(Request $request, EntityManagerInterface $em): Response
    {
        $pokemon = new Pokemons;

        $form = $this->createFormBuilder($pokemon)
            ->add("Name", null)
            ->add("Type", null)
            ->add("numeroPokedex", null)
            ->getForm()
        ;


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($pokemon);
            $em->flush();

            return $this->redirectToRoute("pokemons");
        }

        return $this->render('pokemons/createV4.html.twig', [ 'form' => $form->createView()]);
    }

    #[Route('/pokemons/createV5', name: 'pokemonsCreateV5', methods : ["POST", "GET"])]
    public function createV5(Request $request, EntityManagerInterface $em): Response
    {
        $pokemon = new Pokemons;
        $form = $this->createForm(PokemonsType::class, $pokemon);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($pokemon);
            $em->flush();

            return $this->redirectToRoute("pokemons");
        }

        return $this->render('pokemons/createV5.html.twig', [ 'form' => $form->createView()]);
    }


//v1
    #[Route("/details/v1/{id}", requirements: ["id" => "[0-9]+"], name : "pokemon_details_v1", methods:["GET"])]
    public function details(int $id, PokemonsRepository $repo) : Response
    {
        $pkn = $repo->find($id);

        if(!$pkn)
        {
                throw $this->createNotFoundException("Pokemon " . $id . " non trouvé!");
        }
        return $this->render("pokemons/details.html.twig", compact("pkn"));
    }

    
    //v2 avec paramConverter
    //n'importe quoi... trop facile... merci symfony chou
    //pour ça il faut le bundle sensio/framework-extra-bundle (de base dans l'install full)
    #[Route("/details/v2/{id<[0-9]+>}", name : "pokemon_details_v2", methods:["GET"])]
    public function detailss(Pokemons $pkn) : Response
    {
        return $this->render("pokemons/details.html.twig", compact("pkn"));
    }

}