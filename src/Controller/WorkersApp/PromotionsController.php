<?php
/**
 * Created by PhpStorm.
 * User: gnowa
 * Date: 28.10.2018
 * Time: 16:56
 */

namespace App\Controller\WorkersApp;

use App\Entity\Promocje;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class PromotionsController extends Controller
{
    /**
     * @Route("/worekrsApp/promotions/{page<[1-9]\d*>?1}", name="workers_app/promotions", methods={"GET"})
     */
    public function index($page)
    {
        $pageLimit = $this->getParameter('page_limit');
        $pageCount = $this->getDoctrine()->getRepository(Promocje::class)->getPageCountOfActual($pageLimit);

        if($page > $pageCount)
            return $this->redirectToRoute('workers_app/promotions');
        else {
            $promocje = $this->getDoctrine()->getRepository(Promocje::class)->findActual($page, $pageLimit);
            return $this->render('workersApp/promotions/list.html.twig', array('promocje' => $promocje, 'currentPage' => $page, 'pageCount' => $pageCount));
        }
    }
}