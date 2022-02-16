<?php

namespace App\Controller;

use App\Entity\Sandal;
use App\Form\SandalType;
use App\Repository\SandalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SandalController extends AbstractController
{
    #[Route('/sandals', name: 'sandals')]
    public function index(SandalRepository $repository): Response
    {
        $sandals = $repository->findAll();

        return $this->render('sandal/index.html.twig', [
            "sandals"=>$sandals
        ]);
    }

    #[Route('/uneSandal/{id}', name: 'uneSandal')]
    public function show(Sandal $sandal){

        return $this->render('sandal/show.html.twig', ["sandal"=>$sandal]);

    }
    #[Route('/deleteSandal/{id}', name: 'deleteSandal')]
    public function suppr(Sandal $sandal=null, EntityManagerInterface $manager){

        if ($sandal){
            $manager->remove($sandal);
            $manager->flush();
        }

        return $this->redirectToRoute('sandals');


    }

    #[Route('/newsandal', name: 'newSandal')]
    public function new(Request $request, EntityManagerInterface $manager){
        $chaussure = new Sandal();
        $formulaire = $this->createForm(SandalType::class, $chaussure);

        $formulaire = $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted()){

            $chaussure = $formulaire->getData();
            $manager->persist($chaussure);
            $manager->flush();
            return $this->redirectToRoute('sandals');



        }

        return $this->renderForm('sandal/new.html.twig', ['formulaire'=>$formulaire]);
    }


    #[Route('/update/{id}', name: 'update')]
    public function update(Sandal $sandal, Request $request, EntityManagerInterface $manager){

        $formulaire = $this->createForm(SandalType::class, $sandal);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted()){
            $sandal = $formulaire->getData();
            $manager->persist($sandal);
            $manager->flush();
            return $this->redirectToRoute('sandals');


        }



        return $this->renderForm('sandal/update.html.twig', ['formulaire'=>$formulaire]);
    }
}
