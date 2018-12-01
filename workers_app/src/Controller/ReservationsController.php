<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 21.11.2018
 * Time: 12:45
 */

namespace App\Controller;


use App\Entity\Miejsca;
use App\Entity\Rezerwacje;

use App\Entity\Seanse;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends Controller
{
    /**
     * @Route("/reservations/{page<[1-9]\d*>?1}", name="workers_app/reservations", methods={"GET", "POST"})
     */
    public function index(Request $request, $page)
    {
        if (AppController::logoutOnSessionLifetimeEnd($this->get('session'))) {
            return $this->redirectToRoute('workers_app/logout_page');
        }

        //var_dump($request);

        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            $pageLimit = $this->getParameter('page_limit');
            $pageCount = $this->getDoctrine()->getRepository(Rezerwacje::class)->getPageCount($pageLimit);
            if ($page > $pageCount and $pageCount != 0)
                return $this->redirectToRoute('workers_app/rooms_page');
            else {
                $reservations = $this->getDoctrine()->getRepository(Rezerwacje::class)->getReservations($page, $pageLimit);
                return $this->render('workersApp/reservations/list.html.twig', array('reservations' => $reservations, 'values' => $request->request->all() , 'currentPage' => $page, 'pageCount' => $pageCount));
            }
        } else {
            return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @Route("/reservations/add/{id<[1-9]\d*>?}", name="workers_app/reservations/add", methods={"GET", "POST"})
     */
    public function add(Request $request, $id)
    {
        if (AppController::logoutOnSessionLifetimeEnd($this->get('session'))) {
            return $this->redirectToRoute('workers_app/logout_page');
        }

        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            $submit = $request->request->get('submit');

            $reservation = new Rezerwacje();
            $form = $this->getForm($reservation);
            $form->handleRequest($request);

            $seanceId = 1;
            $seance = $this->getDoctrine()->getRepository(Seanse::class)->getSeance($seanceId);
            $seatsIdArray = explode(",", $request->get('seatId'));
            //var_dump($request->request->all());
            if (($submit == 0 || $submit == 2) && $form->isSubmitted() && $form->isValid() && $this->validSeat($seatsIdArray, $seance[0]['salaid'], $seanceId)) {
                if ($submit == 2) {
                    $seanceObject = $this->getDoctrine()->getRepository(Seanse::class)->find($seanceId);
                    $seatsArrayCollection = new ArrayCollection();
                    foreach ($seatsIdArray as $seatId) {
                        $seatsArrayCollection->add($this->getDoctrine()->getRepository(Miejsca::class)->find($seatId));
                    }
                    $reservation->setCzyodwiedzajacy(0);
                    $reservation->setSfinalizowana(0);
                    $reservation->setPracownicy($this->getUser());
                    $reservation->setSeanse($seanceObject);
                    $reservation->setMiejsca($seatsArrayCollection);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($reservation);
                    $entityManager->flush();

                    return $this->redirectToRoute('workers_app/reservations');
                }
                return $this->render('workersApp/reservations/summary.html.twig', ['seance' => $seance, 'rezervationData' => $request->request->all()]);
            }

            $values = $this->getDoctrine()->getRepository(Miejsca::class)->getRoom($seance[0]['salaid'], $seanceId);
            return $this->render('workersApp/reservations/add.html.twig', ['seance' => $seance, 'values' => $values, 'checkedSeats' => $seatsIdArray, 'form' => $form->createView()]);
        }
    }

    private function validSeat($seatsIdArray, $roomId, $seanceId)
    {
        foreach ($seatsIdArray as $seatId) {
            if (!preg_match('/^[0-9]{1,}$/', $seatId)) {
                return false;
            }

            $seatToCheck = $this->getDoctrine()->getRepository(Miejsca::class)->getSeatToCheck($roomId, $seanceId, $seatId);
            if (!$seatToCheck) {
                return false;
            }

            if ($seatToCheck[0]['typrzedu'] == 2) {
                return false;
            }
            if ($seatToCheck[0]['rezerwacje']) {
                return false;

            }
            if ($seatToCheck[0]['tranzakcje']) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param Rezerwacje $reservation
     * @return \Symfony\Component\Form\FormInterface
     */
    private function getForm(Rezerwacje $reservation)
    {
        return $this->createFormBuilder($reservation)
            ->add('imie', TextType::class, array(
                'label' => 'Imię:',
                'attr' => array('class' => 'form-control',
                    "pattern" => "^[A-ZĄĘÓŁŚŻŹĆŃ][a-zA-ZĄĘÓŁŚŻŹĆŃąęółśżźćń ]{2,44}",
                    'title' => 'Polskie znaki, spacja, pierwsza duża litera, od 3 do 45 znaków',
                    'placeholder' => 'Wprowadź imię...',
                    'autocomplete' => "off"),
                'label_attr' => array('class' => "col-sm-2 col-form-label")
            ))
            ->add('nazwisko', TextType::class, array(
                'label' => 'Nazwisko:',
                'attr' => array('class' => 'form-control',
                    "pattern" => "[A-ZĄĘÓŁŚŻŹĆŃ][a-zA-ZĄĘÓŁŚŻŹĆŃąęółśżźćń \-]{2,44}",
                    'title' => 'Polskie znaki, spacja, myślnik, pierwsza duża litera, od 3 do 45 znaków',
                    'placeholder' => 'Wprwadź nazwisko...',
                    'autocomplete' => "off"),
                'label_attr' => array('class' => "col-sm-2 col-form-label")
            ))
            ->add('email', EmailType::class, array(
                'label' => 'E-mail:',
                'attr' => array('class' => 'form-control',
                    "placeholder" => "Wprowdź email...",
                    'autocomplete' => "off"),
                'label_attr' => array('class' => "col-sm-2 col-form-label")
            ))
            ->add('telefon', TextType::class, array(
                'label' => 'Telefon:',
                'attr' => array("class" => "form-control",
                    "pattern" => "[0-9]{9}",
                    "title" => "9 cyfr",
                    "placeholder" => 'Wprowadź numer telefonu...',
                    'autocomplete' => "off"),
                'label_attr' => array('class' => "col-sm-2 col-form-label")
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Zatwierdz',
                'attr' => array('class' => "btn btn-primary float-right",
                    'onsubmit' => "return onsub()")
            ))
            ->getForm();
    }





    /**
     * @Route("/reservations/delete/{id<[1-9]\d*>?}", name="workers_app/reservations/delete", methods={"DELETE"})
     */
    public function delete(Request $request, $id)
    {
//        if (AppController::logoutOnSessionLifetimeEnd($this->get('session'))) {
//            return $this->redirectToRoute('workers_app/logout_page');
//        }
//
//        if($this->isGranted('ROLE_MANAGER') or $this->isGranted('ROLE_ADMIN')) {
//            $promotion = $this->getDoctrine()->getRepository(Promocje::class)->find($id);
//            if($promotion->getPoczatekpromocji()->format("Y-m-d") > date("Y-m-d")) {
//                $entityManager = $this->getDoctrine()->getManager();
//
//                $entityManager->remove($promotion);
//                $entityManager->flush();
//            }
//        }
    }


}