<?php
namespace App\Controller;

use App\Entity\Pengirim;
use App\Entity\Berita;
use App\Entity\Kategori;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Carbon\Carbon;

class BeritaController extends AbstractController
{
    /**
     * @Route("/berita", name="berita")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $berita_repo = $em->getRepository(Berita::class);
        $pengirim_repo = $em->getRepository(Pengirim::class);

        $berita = $berita_repo->findAllBerita();

        $data = array();
        
        foreach($berita as $val){
            $val->waktu = Carbon::parse($val->getUpdatedAt(), 'UTC')->format('d F Y');
            $val->isi_potong = $this->potongIsi($val->getIsi(), $val->getSlug());
            $val->pengirimm = $pengirim_repo->find($val->getPengirim())->getNama();
            $data[] = $val;
        }

        // return new JsonResponse(['berita' => $data]);

        return $this->render('berita/index2.html.twig', [
            'berita' => $data,
        ]);
    }

    /**
     * @Route("/berita/detail/{slug}", name="berita_detail")
     */
    public function show($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $berita_repo = $em->getRepository(Berita::class);

        $berita = $berita_repo->findOneBySlug($slug);
        
        $berita->kate = $em->getRepository(Kategori::class)->find($berita->getKategori())->getNama();
        $berita->sender = $em->getRepository(Pengirim::class)->find($berita->getPengirim())->getNama();
        $berita->waktu = Carbon::parse($berita->getUpdatedAt(), 'UTC')->format('d F Y');

        $berita_terkait = $berita_repo->findByKategori($berita->getKategori(), $berita->getId());

        $this->check($berita);

        // dump($berita);


        return $this->render('berita/detail.html.twig', [
            'berita' => $berita,
            'berita_terkait' => $berita_terkait,
        ]);
    }

    /**
     * @Route("/berita/store", name="berita_store")
     */
    public function store(ValidatorInterface $validator): Response
    {
        $em = $this->getDoctrine()->getManager();
        $pengirim = $em->getRepository(Pengirim::class)->find(3);
        $kategori = $em->getRepository(Kategori::class)->find(3);

        $berita = new Berita();
        $berita->setJudul('Karena Because 1 Tak PernAh Nev4er');
        $berita->setIsi('Moh. Hatta Moh. Hatta Moh. Hatta Moh. Hatta');
        $berita->setSlug($this->generateSlug($berita->getJudul()));
        $berita->setSoftDelete(false);
        $berita->setCreatedAt($this->getDateTime());
        $berita->setUpdatedAt($this->getDateTime());
        $berita->setKategori($kategori);
        $berita->setPengirim($pengirim);

        // error check
        $errors = $validator->validate($berita);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        $em->persist($berita);

        $em->flush();

        return new Response('Saved !!!');
    }

    private function potongIsi($isi, $slug){
        $char_max = 200;
        $string = strip_tags($isi);

        if (strlen($string) > $char_max) {

            //potong sampai $char_max
            $stringCut = substr($string, 0, $char_max);
            $endPoint = strrpos($stringCut, ' ');

            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        }

        return $string;
    }

    private function generateSlug($judul)
    {
        $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($judul)));

        $em = $this->getDoctrine()->getManager();
        $berita_like_slug = $em->getRepository(Berita::class)->findBySlug($slug);


        if ($berita_like_slug!=null) {
            $data = array();

            foreach ($berita_like_slug as $row) {
                $data[] = $row['slug'];
            }

            if (in_array($slug, $data)) {
                $count = 0;
                while (in_array(($slug . '-' . ++$count), $data));
                $slug = $slug . '-' . $count;
            }
        }

        return $slug;
    }

    private function getDateTime(){
        date_default_timezone_set('Asia/Jakarta');
        return new \DateTime("now");
    }

    private function check($data){
        if ($data) {
            return true;
        }else{
            throw $this->createNotFoundException(
                'No data in this case'
            );
        }
    }
}
