<?php
/**
 * Created by PhpStorm.
 * User: gnowa
 * Date: 23.10.2018
 * Time: 09:01
 */

namespace App\Controller\WorkersApp;

use App\Controller\LoginController;
use App\Entity\Pracownicy;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Routing\Annotation\Route;

class BaseController extends Controller
{
    /**
     * @Route("/", name="workers_app/main_page", methods={"GET"})
     */
    public function index()
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY'))
            return $this->render('workersApp/mainPage/mainPage.html.twig');
        else{
            return $this->redirectToRoute('workers_app/login_page');
        }
    }
}