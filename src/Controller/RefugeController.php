<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AnimalFormType;
use App\Entity\{Refuge, Chien, Chat, Oiseau};

class RefugeController extends AbstractController
{
    private Refuge $refuge;

    public function __construct()
    {
        $this->refuge = new Refuge();
    }

    /**
     * @Route("/", name="refuge_home")
     */
    public function index(): Response
    {
        return $this->render('refuge/index.html.twig', [
            'animaux' => $this->refuge->listerAnimaux()
        ]);
    }

    /**
     * @Route("/ajouter", name="refuge_ajouter")
     */
    public function ajouter(Request $request): Response
    {
        $form = $this->createForm(AnimalFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $animal = match ($data['type']) {
                'Chien' => new Chien($data['nom'], $data['age'], $data['sexe'], $data['race']),
                'Chat' => new Chat($data['nom'], $data['age'], $data['sexe'], $data['couleur']),
                'Oiseau' => new Oiseau($data['nom'], $data['age'], $data['sexe'], $data['espece']),
            };
            $this->refuge->ajouterAnimal($animal);

            return $this->redirectToRoute('refuge_home');
        }

        return $this->render('refuge/ajouter.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/sons", name="refuge_sons")
     */
    public function sons(): Response
    {
        $sons = $this->refuge->faireEmettreSon();
        return $this->render('refuge/sons.html.twig', ['sons' => $sons]);
    }

    /**
     * @Route("/deplacements", name="refuge_deplacements")
     */
    public function deplacements(): Response
    {
        $deplacements = $this->refuge->faireDeplacer();
        return $this->render('refuge/deplacements.html.twig', ['deplacements' => $deplacements]);
    }
}
