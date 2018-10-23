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
        //czy zalogowany
        //tak
        return $this->render('workersApp/mainPage/mainPage.html.twig', array(
            'logged_role' => 1,
            'logged_name' => "Euzebiusz"
        ));

        //nie
        //przekieruj na stronę logowania
    }
}