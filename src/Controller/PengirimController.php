<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Pengirim;
use App\Repository\PengirimRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;


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
     * @Route("/pengirim/store", name="pengirim_store")
     */
    public function store(ValidatorInterface $validator): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $em = $this->getDoctrine()->getManager();

        $pengirim = new Pengirim();
        $pengirim->setNama('Moh. Hatta');

        // error check
        $errors = $validator->validate($pengirim);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($pengirim);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved !!!');
    }

    /**
     * @Route("/pengirim/{id}", name="pengirim_show")
     */
    public function show($id)
    {
        $pengirim = $this->getDoctrine()
            ->getRepository(Pengirim::class)
            ->find($id);

        if (!$pengirim) {
            throw $this->createNotFoundException(
                'No pengirim found for id ' . $id
            );
        }

        return new Response('Check out this great pengirim: ' . $pengirim->getNama());
    }

    /**
     * @Route("/pengirim/update/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $pengirim = $entityManager->getRepository(Pengirim::class)->find($id);

        if (!$pengirim) {
            throw $this->createNotFoundException(
                'No pengirim found for id ' . $id
            );
        }

        $pengirim->setNama('New pengirim name!');
        $entityManager->flush();

        return $this->redirectToRoute('pengirim_show', [
            'id' => $pengirim->getId()
        ]);
    }

    /**
     * @Route("/pengirim/destroy/{id}")
     */
    public function destroy($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $pengirim = $entityManager->getRepository(Pengirim::class)->find($id);

        if (!$pengirim) {
            throw $this->createNotFoundException(
                'No pengirim found for id ' . $id
            );
        }

        $entityManager->remove($pengirim);
        $entityManager->flush();

        return new Response('Deleted !!!');
    }


}
