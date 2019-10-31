<?php

namespace App\Controller;

use App\Entity\Kategori;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


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

    /**
     * @Route("/kategori/store", name="kategori_store")
     */
    public function store(ValidatorInterface $validator): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $em = $this->getDoctrine()->getManager();

        $kategori = new Kategori();
        $kategori->setNama('Teknologi');

        // error check
        $errors = $validator->validate($kategori);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($kategori);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved !!!');
    }

    /**
     * @Route("/kategori/all", name="kategori_all")
     */
    public function showAll(){
        $entityManager = $this->getDoctrine()->getManager();
        // $kategori = $entityManager->getRepository(Kategori::class)->findAll();

        $qb = $entityManager->createQueryBuilder()
            ->select('k')
            ->from('App\Entity\Kategori', 'k')
            ->orderBy('k.id', 'DESC')
            ->getQuery();

        $kategori =  $qb->execute();

        $data = array();
        $get = 'getId';
        foreach($kategori as $value){
            $data[] = array('id'=> $value->$get() , 'nama' => $value->getNama());
        }
        $response = new JsonResponse(['kategori' =>$data]);

        return $response;
    }
}
