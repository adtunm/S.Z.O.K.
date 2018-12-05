<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 17.11.2018
 * Time: 17:58
 */

namespace App\Controller;


use App\Entity\Bilety;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    /**
     * @Route("/ticket/{id<[1-9]\d*>?}", name="ticket", methods={"GET", "POST"})
     */
    function createTicket($id, Request $request){
        if ($this->isGranted('ROLE_USER') and AppController::logoutOnSessionLifetimeEnd($this->get('session'))) {
            return $this->redirectToRoute('clients_app/logout_page');
        }
        $entityManager = $this->getDoctrine()->getManager();
        $tickets = $entityManager->getRepository(Bilety::class)->getTickets($id);
        $snappy = $this->get('knp_snappy.pdf');
        $html = $this->renderView('clientsApp/ticket/ticket.html.twig', ['bilety' => $tickets]);
        $output = '../../ticket.pdf';
        $snappy->generateFromHtml($html, $output);
        // insert mailing here
        if(file_exists($output)){
            unlink($output);
        }
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="ticket.pdf"'
            )
        );
    }
}