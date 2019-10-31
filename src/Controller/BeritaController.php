<?php

namespace App\Controller;

use App\Entity\Pengirim;
use App\Repository\BeritaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Carbon\Carbon;

class BeritaController extends AbstractController
{
    /**
     * @Route("/berita", name="berita")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $berita_repo = $em->getRepository(Pengirim::class);

        $berita = $berita_repo->findBeritaAll();

        $data = array();
        
        foreach($berita as $val){
            // if($val->soft_delete=='f'){            }
            $val->waktu = Carbon::parse($val->updated_at, 'UTC')->format('d F Y');
            $data[] = $val;
        }

        $response = new JsonResponse(['berita' => $data]);

        return $response;

        // return $this->render('berita/index.html.twig', [
        //     'berita' => $data,
        // ]);
    }
}
