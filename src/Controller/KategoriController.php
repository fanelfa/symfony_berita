<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class KategoriController extends AbstractController
{
    /**
     * @Route("/kategori", name="kategori")
     */
    public function index()
    {
        return $this->render('kategori/index.html.twig', [
            'controller_name' => 'KategoriController',
        ]);
    }
}
