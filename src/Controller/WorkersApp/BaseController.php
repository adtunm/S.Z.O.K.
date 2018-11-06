<?php
/**
 * Created by PhpStorm.
 * User: gnowa
 * Date: 23.10.2018
 * Time: 09:01
 */

namespace App\Controller\WorkersApp;

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
        else {
            return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @Route("/workersApp/no-permission", name="workers_app/no_permission", methods={"GET"})
     */
    public function noPermission()
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY'))
            return $this->render('workersApp/mainPage/noPermission.html.twig');
        else {
            return $this->redirectToRoute('workers_app/login_page');
        }
    }
}