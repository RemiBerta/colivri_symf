<?php

namespace App\Controller;

use App\Repository\PictureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PictureController extends AbstractController
{
    #[Route('/picture', name: 'app_picture')]
    public function index(): Response
    {
        return $this->render('picture/index.html.twig', [
            'controller_name' => 'PictureController',
        ]);
    }

    #[Route('/pictures', name: 'picture_list')]
    public function list(PictureRepository $pictureRepository): Response
    {
        $pictures = $pictureRepository->findAll();

        return $this->render('picture/list.html.twig', [
            'pictures' => $pictures
        ]);
    }
}
