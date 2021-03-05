<?php
namespace App\Controller;


use App\Form\InscrClientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConnectController extends AbstractController
{
    /**
     * @Route("/connect", name="connect")
     */
    public function connect() {
        return $this->render('connect\connect.html.twig');
    }

    /**
     * @Route("/sign_up", name="sign_up")
     */
    public function sign_up(Request $request, EntityManagerInterface $em) {
        $form = $this->createForm(InscrClientType::class);  // On fait passer la classe de formulaire au create form afin qu'il la génère

        $form->handleRequest($request); // On récupère le formulaire envoyé dans la requête
        if ($form->isSubmitted() && $form->isValid()) { // on véfifie si le formulaire est envoyé et si il est valide
            $object = $form->getData(); // On récupère l'object associé
            $em->persist($object); // on le persiste
            $em->flush(); // on save
            return $this->redirectToRoute('listall');
        }
        return $this->render('connect\sign_up.html.twig', ['form' => $form->createView()]);  // on envoie ensuite le formulaire au template
    }

    /**
     * @Route("/password_forgotten", name="password_forgotten")
     */
    public function password_forgotten() {
        return $this->render('connect\password_forgotten.html.twig');
    }

    /**
     * @Route("/password_reset", name="password_reset")
     */
    public function password_reset() {
        return $this->render('connect\password_reset.html.twig');
    }
}