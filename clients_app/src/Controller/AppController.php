<?php
/**
 * Created by PhpStorm.
 * User: gnowa
 * Date: 23.10.2018
 * Time: 09:01
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Routing\Annotation\Route;

class AppController extends Controller
{
    /**
     * @Route("/", name="clients_app/main_page", methods={"GET"})
     */
    public function index()
    {
        return $this->render('clientsApp/mainPage/mainPage.html.twig');
    }
}