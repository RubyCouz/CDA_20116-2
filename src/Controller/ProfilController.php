<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function profil()
    {
        return $this->render('profil/profil.html.twig');
    }


    /**
     * @Route("/profil/infos", name="infos")
     */
    public
    function infos()
    {
        return $this->render('profil/infos.html.twig');
    }


    /**
     * @Route("/profil/shop", name="shop")
     */
    public
    function shop()
    {
        return $this->render('profil/shop.html.twig');
    }


    /**
     * @Route("/profil/addresses", name="addresses")
     */
    public
    function addresses()
    {
        return $this->render('profil/addresses.html.twig');
    }


    /**
     * @Route("/profil/registered", name="registered")
     */
    public
    function registered()
    {
        return $this->render('profil/registered.html.twig');
    }


    /**
     * @Route("/profil/transaction", name="transaction")
     */
    public
    function transaction()
    {
        return $this->render('profil/transaction.html.twig');
    }


    /**
     * @Route("/profil/payments", name="payments")
     */
    public
    function payments()
    {
        return $this->render('profil/payments.html.twig');
    }


    /**
     * @Route("/profil/update", name="update")
     */
    public
    function update()
    {
        return $this->render('profil/update/update.html.twig');
    }
}