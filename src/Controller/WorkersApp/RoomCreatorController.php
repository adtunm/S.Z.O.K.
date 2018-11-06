<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 28.10.2018
 * Time: 17:25
 */

namespace App\Controller\WorkersApp;


use App\Entity\Miejsca;
use App\Entity\Rzedy;
use App\Entity\Sale;
use App\Entity\Typyrzedow;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class RoomCreatorController extends Controller
{
    /**
     * @Route("/workersApp/roomCreator", name="workers_app/room_creator_page", methods={"GET", "POST"})
     */
    public function index(AuthenticationUtils $authenticationUtils, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        if ($request->getContentType()) {

            $rowCount = $request->get('rowCount');
            $seatCount = $request->get('seatCount');
            $rowCode = $request->get('rowCode');
            $seatCode = $request->get('seatCode');
            $roomNumber = $request->get('roomNumber');

            $room = new Sale();
            $room->setNumersali($roomNumber);
            $room->setDlugoscsali($rowCount);
            $room->setSzerokoscsali($seatCount);

            $entityManager->persist($room);
            $entityManager->flush();

            for ($i = 0; $i < $rowCount; $i++) {
                $row = new Rzedy();
                $row->setNumerrzedu($i + 1);

                $rowType = $entityManager->getRepository(Typyrzedow::class)->find($rowCode[$i]);
                $row->setTypyrzedow($rowType);

                $row->setSale($room);

                $entityManager->persist($row);
                $entityManager->flush();

                $seatNumber = 1;
                for ($j = 0; $j < $seatCount; $j++) {
                    $seat = new Miejsca();
                    $seat->setPozycja($j + 1);

                    $positionVariable = $seatCount * $i + $j;
                    if ($seatCode[$positionVariable] == 1) {
                        $seat->setNumermiejsca($seatNumber);
                        $seatNumber++;
                    } else {
                        $seat->setNumermiejsca(0);
                    }

                    $seat->setRzedy($row);

                    $entityManager->persist($seat);
                    $entityManager->flush();
                }
            }
        }


        $screeningRoom = $entityManager->getRepository(Sale::class)->findOneBy(array('numersali' => 1));
        if ($screeningRoom) {
            $error = 'Sala o podanym numerze już istnieje. Zmień numer sali.';
        } else {
            $error = null;
        }


        if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
            return $this->render('workersApp/screeningRoomPages/roomCreator.html.twig', ['error' => $error]);
        else {
            return $this->redirectToRoute('workers_app/login_page');
        }
    }

    private function decodeRoomView()
    {

    }

}