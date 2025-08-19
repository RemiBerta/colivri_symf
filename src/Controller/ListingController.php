<?php

namespace App\Controller;

use App\Repository\ListingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListingController extends AbstractController
{
    #[Route('/listing', name: 'app_listing')]
    public function index(): Response
    {
        return $this->render('listing/index.html.twig', [
            'controller_name' => 'ListingController',
        ]);
    }

    #[Route('/listings', name: 'listing_list')]
    public function list(ListingRepository $listingRepository): Response
    {
        $listings = $listingRepository->findAll();

        return $this->render('listing/list.html.twig', [
            'listings' => $listings
        ]);
    }
}
