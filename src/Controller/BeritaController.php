<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BeritaController extends AbstractController
{
    /**
     * @Route("/berita", name="berita")
     */
    public function index()
    {
        return $this->render('berita/index.html.twig', [
            'controller_name' => 'BeritaController',
        ]);
    }
}
