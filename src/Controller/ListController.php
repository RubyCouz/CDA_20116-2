<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/", name="nav")
     */
    public function nav() {
        return $this->render('nav.html.twig');
    }

    /**
     * @Route("/home", name="home")
     */
    public function home() {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/listall", name="listall")
     */
    public function listall()
    {
        $guitars = $this->getDoctrine()
            ->getManager()
            ->getRepository('App:Guitar')
            ->getAll();
        return $this->render('list\list1.html.twig', array('guitars' => $guitars));
    }

    /**
     * @Route("/listelec", name="listelec")
     */
    public function listelec()
    {
        $guitars = $this->getDoctrine()
            ->getManager()
            ->getRepository('App:Guitar')
            ->getElec();
        return $this->render('list\list2.html.twig', array('guitars' => $guitars));
    }

    /**
     * @Route("/listacous", name="listacous")
     */
    public function listacous()
    {
        $guitars = $this->getDoctrine()
            ->getManager()
            ->getRepository('App:Guitar')
            ->getAcoust();
        return $this->render('list\list2.html.twig', array('guitars' => $guitars));
    }

    /**
     * @Route("/listbass", name="listbass")
     */
    public function listbass()
    {
        $guitars = $this->getDoctrine()
            ->getManager()
            ->getRepository('App:Guitar')
            ->getBass();
        return $this->render('list\list2.html.twig', array('guitars' => $guitars));
    }
}