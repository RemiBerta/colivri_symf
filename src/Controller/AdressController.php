<?php

namespace App\Controller;

use App\Repository\AdressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdressController extends AbstractController
{
    #[Route('/adress', name: 'app_adress')]
    public function index(): Response
    {
        return $this->render('adress/index.html.twig', [
            'controller_name' => 'AdressController',
        ]);
    }

    #[Route('/adresses', name: 'adress_list')]
    public function list(AdressRepository $adressRepository): Response
    {
        $adresses = $adressRepository->findAll();

        return $this->render('adress/list.html.twig', [
            'adresses' => $adresses
        ]);
    }
}
