<?php
/**
 * Created by PhpStorm.
 * User: gnowa
 * Date: 18.11.2018
 * Time: 13:55
 */

namespace App\Controller;

use App\Entity\Filmy;
use App\Entity\Kategoriewiekowe;
use App\Entity\Rodzajefilmow;
use App\Entity\Seanse;
use App\Entity\SeansMaFilmy;
use App\Entity\Typyseansow;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MoviesController extends Controller
{
    /**
     * @Route("/movies/{page<[1-9]\d*>?1}", name="clients_app/movies", methods={"GET"})
     * @Route("/", name="clients_app/main_page", methods={"GET"})
     */
    public function index($page = 1)
    {
        $pageLimit = 8;
        $pageCount = $this->getDoctrine()->getRepository(Filmy::class)->getPageCountOfActual($pageLimit);

        if($page > $pageCount and $pageCount != 0)
            return $this->redirectToRoute('clients_app/movies');
        else {
            $movies = $this->getDoctrine()->getRepository(Filmy::class)->findPageOfActual($page, $pageLimit);
            return $this->render('clientsApp/movies/list.html.twig', array('movies' => $movies, 'currentPage' => $page, 'pageCount' => $pageCount));
        }
    }

    /**
     * @Route("/movies/all/{page<[1-9]\d*>?1}", name="clients_app/movies/all", methods={"GET"})
     */
    public function listAll($page)
    {
        $pageLimit = 8;
        $pageCount = $this->getDoctrine()->getRepository(Filmy::class)->getPageCount($pageLimit);

        if($page > $pageCount and $pageCount != 0)
            return $this->redirectToRoute('clients_app/movies');
        else {
            $movies = $this->getDoctrine()->getRepository(Filmy::class)->findPage($page, $pageLimit);
            return $this->render('clientsApp/movies/listAll.html.twig', array('movies' => $movies, 'currentPage' => $page, 'pageCount' => $pageCount));
        }
    }

    /**
     * @Route("/movies/show/{id<[1-9]\d*>}/{page<[1-9]\d*>?1}", name="workers_app/movies/show", methods={"GET", "POST"})
     */
    public function show($id, $page)
    {
        $movie = $this->getDoctrine()->getRepository(Filmy::class)->find($id);
        if(!$movie)
            return $this->redirectToRoute('workers_app/no_permission');

        if($_POST and isset($_POST['form_date'])) {
            if(\DateTime::createFromFormat('Y-m-d', $_POST['form_date'])) {
                $date = $_POST['form_date'];
            } else {
                $date = date('Y-m-d');
            }
        } else {
            $date = date('Y-m-d');
        }

        $pageLimit = 5;
        $seancesPageCount = $this->getDoctrine()->getRepository(Seanse::class)
            ->getPageCountForMovie($movie, $date, $pageLimit);

        if($seancesPageCount > 0) {
            if($seancesPageCount < $page) $page=1;
            $seancesPage = $this->getDoctrine()->getRepository(Seanse::class)
                ->findSeancesForMovie($movie, $date, $page, $pageLimit);
        } else {
            $seancesPage = NULL;
        }

        return $this->render('clientsApp/movies/show.html.twig', array(
            'movie' => $movie,
            'dateInput' => $date,
            'pageCount' => $seancesPageCount,
            'seancesPage' => $seancesPage,
            'currentPage' => $page
        ));
    }
}