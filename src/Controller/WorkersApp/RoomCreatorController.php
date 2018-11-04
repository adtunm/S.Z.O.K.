<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 28.10.2018
 * Time: 17:25
 */

namespace App\Controller\WorkersApp;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class RoomCreatorController extends Controller
{
    /**
     * @Route("/workersApp/roomCreator", name="workers_app/room_creator_page")
     */
    public function index()
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY'))
            return $this->render('workersApp/screeningRoomPages/roomCreator.html.twig');
        else{
            return $this->redirectToRoute('workers_app/login_page');
        }
    }
}