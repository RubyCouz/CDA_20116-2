<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Commandes;
use App\Entity\Paiements;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client")
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client_index", methods={"GET"})
     */
    public function index(ClientRepository $clientRepository): Response
    {
        return $this->render('base_profil.html.twig', [
            'clients' => $clientRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="client_show", methods={"GET"})
     */
    public function show(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Client $client): Response
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/edit.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/shop", name="client_shop")
     */
    public
    function shop(Client $client, Commandes $commandes)
    {
        return $this->render('client/shop.html.twig', [
            'client' => $client,
            'commande' => $commandes
        ]);
    }

    /**
     * @Route("/{id}/addresses", name="client_addresses")
     */
    public
    function addresses(Client $client)
    {
        return $this->render('client/addresses.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/{id}/paiement", name="client_payments")
     */
    public
    function payments(Client $client, Commandes $commandes, Paiements $paiements)
    {
        return $this->render('client/payments.html.twig', [
            'client' => $client,
            'commande' => $commandes,
            'paiement' => $paiements
        ]);
    }
}