<?php

namespace App\Controller;


use App\Entity\Avis;
use App\Form\AvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AvisController extends AbstractController{
    #[Route('/avis', name: 'app_avis')]
    public function avis(Request $request, EntityManagerInterface $em, ): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($avis);
            $em->flush();
        
            $this->addFlash('success', 'Avis envoyé avec succès');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('avis/index.html.twig', [
            'avis' => $form
        ]);
    }

    
}
