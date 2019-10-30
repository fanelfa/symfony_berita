<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Pengirim;
use App\Repository\PengirimRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PengirimController extends AbstractController
{
    /**
     * @Route("/pengirim", name="pengirim")
     */
    public function index()
    {
        return $this->render('pengirim/index.html.twig', [
            'controller_name' => 'PengirimController',
        ]);
    }
    /**
     * @Route("/pengirim/store", name="pengirim.store")
     */
    public function store()
    {
        $data = [
            'nama' => 'Harianto Sukinah',
        ];

        if ($this->buat($data)) {
            return new Response('Saved !!!');
        }
    }

    private function buat($arr_data)
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $em = $this->getDoctrine()->getManager();

        $pengirim = new Pengirim();
        $pengirim->setNama($arr_data['nama']);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($pengirim);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return true;
    }

}
