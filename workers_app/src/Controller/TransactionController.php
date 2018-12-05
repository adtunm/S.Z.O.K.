<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 17.11.2018
 * Time: 17:58
 */

namespace App\Controller;


use App\Entity\Bilety;
use App\Entity\Miejsca;
use App\Entity\Promocje;
use App\Entity\PulabiletowMaRodzajebiletow;
use App\Entity\Pulebiletow;
use App\Entity\Rezerwacje;
use App\Entity\Rodzajeplatnosci;
use App\Entity\Seanse;
use App\Entity\Tranzakcje;
use App\Entity\Vouchery;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    /**
     * @Route("/transaction/add/{id<[1-9]\d*>?}", name="workers_app/transactions/add", methods={"GET", "POST"})
     */
    public function add(Request $request, $id)
    {
        if (AppController::logoutOnSessionLifetimeEnd($this->get('session'))) {
            return $this->redirectToRoute('workers_app/logout_page');
        }

        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            $submit = $request->request->get('submit');

            $seanceId = $id;
            $seance = $this->getDoctrine()->getRepository(Seanse::class)->getSeance($seanceId);
//            $selectedSeatsIdArray = [];
//            $selectedTicketsIdArray = [];

            //$selectedTickets = $this->getDoctrine()->getRepository(PulabiletowMaRodzajebiletow::class)->findById($selectedTicketsIdArray);
            //$selectedSeatsData = array_merge_recursive($selectedSeats, $selectedTickets);
//            if (($submit == 0 || $submit == 2) && $this->validSeat($seatsIdArray, $seance[0]['salaid'], $seanceId)) {
//                if ($submit == 2) {
//                    $seanceObject = $this->getDoctrine()->getRepository(Seanse::class)->find($seanceId);
//                    $seatsArrayCollection = new ArrayCollection();
//                    foreach ($seatsIdArray as $seatId) {
//                        $seatsArrayCollection->add($this->getDoctrine()->getRepository(Miejsca::class)->find($seatId));
//                    }
//                    $reservation->setCzyodwiedzajacy(0);
//                    $reservation->setSfinalizowana(0);
//                    $reservation->setPracownicy($this->getUser());
//                    $reservation->setSeanse($seanceObject);
//                    $reservation->setMiejsca($seatsArrayCollection);
//                    $entityManager = $this->getDoctrine()->getManager();
//                    $entityManager->persist($reservation);
//                    $entityManager->flush();
//
//                    return $this->redirectToRoute('workers_app/reservations');
//                }
//                return $this->render('workersApp/reservations/summary.html.twig', ['seance' => $seance, 'rezervationData' => $request->request->all()]);
//            }
            //var_dump($request->request->all());
            $selectedSeatsIdArray = [];
            $requestArray = $request->request->all();
            if (!empty($requestArray) && !$submit) {
                $selectedSeatsIdArray = array_keys($requestArray);
                $selectedTicketsIdArray = array_values($requestArray);
                if ($this->validSeat($selectedSeatsIdArray, $seance[0]['salaid'], $seanceId) && $this->validTickets($selectedTicketsIdArray, $seanceId)) {

                    $selectedTickets = [];
                    $selectedSeats = $this->getDoctrine()->getRepository(Miejsca::class)->findById($selectedSeatsIdArray);
                    for ($i = 0; $i < count($selectedTicketsIdArray); $i++) {
                        $selectedTickets[] = $this->getDoctrine()->getRepository(PulabiletowMaRodzajebiletow::class)->find($selectedTicketsIdArray[$i]);
                    }
                    $promotions = $this->getDoctrine()->getRepository(Promocje::class)->findCurrent();
                    $paymentWay = $this->getDoctrine()->getRepository(Rodzajeplatnosci::class)->findAll();
                    return $this->render('workersApp/transactions/summary.html.twig', ['seance' => $seance,
                        'selectedSeats' => $selectedSeats, 'selectedTickets' => $selectedTickets, 'valueArray' => $requestArray,
                        'promotions' => $promotions, 'paymentWay' => $paymentWay]);
                }
            }

            if (!empty($requestArray) && $submit == 1) {
                $selectedSeatsIdArray = explode(",", $requestArray['seatsIds']);
                $selectedTicketsIdArray = explode(",", $requestArray['ticketsIds']);
                $selectedVouchersIdArray = explode(",", $requestArray['vouchersIds']);
                $selectedPromotionId = $requestArray['promotionId'];
                $selectedPaymentWayId = $requestArray['paymentId'];
                var_dump($selectedVouchersIdArray, $selectedPaymentWayId);
                var_dump($this->validSeat($selectedSeatsIdArray, $seance[0]['salaid'], $seanceId),
                    $this->validTickets($selectedTicketsIdArray, $seanceId),
                    $this->validVoucher($selectedVouchersIdArray),
                    (!$selectedPromotionId ||
                        $this->getDoctrine()->getRepository(Promocje::class)->getPromotionToCheck($selectedPromotionId)),
                    ($selectedPaymentWayId == 1 || $selectedPaymentWayId == 2));
                if ($this->validSeat($selectedSeatsIdArray, $seance[0]['salaid'], $seanceId) &&
                    $this->validTickets($selectedTicketsIdArray, $seanceId) &&
                    $this->validVoucher($selectedVouchersIdArray) &&
                    (!$selectedPromotionId ||
                        $this->getDoctrine()->getRepository(Promocje::class)->getPromotionToCheck($selectedPromotionId)) &&
                    ($selectedPaymentWayId == 1 || $selectedPaymentWayId == 2)) {

                    $entityManager = $this->getDoctrine()->getManager();
                    //dodanie do bazy, render strony koncowej, render biletu pdf
                    $transaction = new Tranzakcje();
                    $date = new \DateTime(date('Y-m-d'));
                    $transaction->setData($date);
                    $transaction->setRodzajeplatnosci($this->getDoctrine()->getRepository(Rodzajeplatnosci::class)->findOneById($selectedPaymentWayId));
                    $transaction->setSeanse($this->getDoctrine()->getRepository(Seanse::class)->findOneById($seanceId));
                    $transaction->setPracownicy($this->getUser());
                    $promotion = $this->getDoctrine()->getRepository(Promocje::class)->findOneById($selectedPromotionId);
                    $transaction->setPromocje($promotion);
                    $transaction->setCzyodwiedzajacy(0);
                    $ticketsArrayCollection = new ArrayCollection();
                    for ($i = 0; $i < count($selectedSeatsIdArray); $i++) {
                        $ticket = new Bilety();
                        $ticketType = $this->getDoctrine()->getRepository(PulabiletowMaRodzajebiletow::class)->findOneById($selectedTicketsIdArray[$i]);
                        $voucher = $this->getDoctrine()->getRepository(Vouchery::class)->findOneById($selectedVouchersIdArray[$i]);
                        $ticket->setCena($this->calculatePrice($ticketType, $promotion, $voucher));
                        $ticket->setLosowecyfry(rand(100, 999));
                        $ticket->setCyfrakontrolna(0);
                        $ticket->setTranzakcje($transaction);
                        $ticket->setRodzajebiletow($ticketType->getRodzajebiletow());
                        $ticket->setMiejsca($this->getDoctrine()->getRepository(Miejsca::class)->findOneById($selectedSeatsIdArray[$i]));
                        $ticket->setVouchery($voucher);
                        $ticketsArrayCollection->add($ticket);
                        $entityManager->persist($ticket);
                    }
                    $transaction->setBilety($ticketsArrayCollection);
                    $entityManager->persist($transaction);
                    $entityManager->flush();

                    $ticketsWithoutControlNumber = $this->getDoctrine()->getRepository(Bilety::class)->findBy(['tranzakcje' => $transaction]);
                    foreach ($ticketsWithoutControlNumber as $ticketWithoutControlNumber){
                        $ticketWithoutControlNumber->recalculateControlDigit();
                        $entityManager->persist($ticketWithoutControlNumber);
                    }
                    $entityManager->flush();
                }
            }

            if (!empty($requestArray) && $submit == 2) {
                $selectedSeatsIdArray = explode(",", $requestArray['seatsIds']);
            }

            $tickets = $this->getDoctrine()->getRepository(Pulebiletow::class)->getSeancesTickets($seanceId);
            $room = $this->getDoctrine()->getRepository(Miejsca::class)->getRoom($seance[0]['salaid'], $seanceId);
            return $this->render('workersApp/transactions/add.html.twig', ['seance' => $seance,
                'values' => $room, 'tickets' => $tickets, 'selectedSeats' => $selectedSeatsIdArray]);
        }
    }

    private function calculatePrice($ticketType, $promotion, $voucher)
    {
        $price = $ticketType->getCena();
        if ($promotion) {
            if ($promotion->isCzykwotowa()) {
                $price -= $promotion->getWartosc();
            } else {
                $price -= $price * ($promotion->getWartosc() / 100);
            }
        }
        if ($voucher) {
            if ($voucher->isCzykwotowa()) {
                $price -= $voucher->getWartosc();
            } else {
                $price -= $price * ($voucher->getWartosc() / 100);
            }
        }
        if ($price < 0) {
            $price = 0;
        }
        return $price;
    }


    private function validTickets($ticketsIdArray, $seanceId)
    {
        foreach ($ticketsIdArray as $ticketId) {
            if (!preg_match('/^[0-9]{1,}$/', $ticketId)) {
                return false;
            }
            $ticketToCheck = $this->getDoctrine()->getRepository(Pulebiletow::class)->getTicketToCheck($seanceId, $ticketId);
            if (!$ticketToCheck) {
                return false;
            }
        }
        return true;
    }

    private function validVoucher($voucherIdArray)
    {
        foreach ($voucherIdArray as $voucherId) {
            if($voucherId) {
                if (!preg_match('/^[0-9]{1,}$/', $voucherId)) {
                    return false;
                }
                $voucher = $this->getDoctrine()->getRepository(Vouchery::class)->findOneBy(['id' => $voucherId]);

                if (!$voucher) {
                    return false;
                }
                if ($voucher->getCzywykorzystany()) {
                    return false;
                }
                if ($voucher->getKoniecpromocji()->format('Y-m-d') < date("Y-m-d")) {
                    return false;
                }
                if ($voucher->getPoczatekpromocji()->format('Y-m-d') > date("Y-m-d")) {
                    return false;
                }
            }
        }
        return true;
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
     * @Route("/transaction/check_voucher/{id<[1-9]\d*>?}", name="workers_app/transactions/check_voucher", methods={"POST"})
     */
    function checkVoucherByCode(Request $reguest, $id)
    {

        $voucherCode = $reguest->get('voucherCode');

//        if(strlen($voucherCode) != 21 || !preg_match('/^[0-9]{1,}$/', $voucherCode)){
//            return new JsonResponse( ['error' => 'Błędny kod vouchera'] );
//        }

        $voucher = $this->getDoctrine()->getRepository(Vouchery::class)->findOneBy(['losowecyfry' => 535]);

        if (!$voucher) {
            return new JsonResponse(['error' => 'Voucher o podanym kodzie nie istnieje']);
        }
        if ($voucher->getCzywykorzystany()) {
            return new JsonResponse(['error' => 'Voucher o podanym kodzie został już wykorzystany.']);
        }
        if ($voucher->getKoniecpromocji()->format('Y-m-d') < date("Y-m-d")) {
            return new JsonResponse(['error' => 'Voucher o podanym kodzie utracił swoją ważność.']);
        }

        if ($voucher->getPoczatekpromocji()->format('Y-m-d') > date("Y-m-d")) {
            return new JsonResponse(['error' => 'Voucher o podanym kodzie nie jest jeszcze aktywny.']);
        }

        $voucherObj = [
            'id' => $voucher->getId(),
            'czykwotowa' => $voucher->isCzykwotowa(),
            'wartosc' => $voucher->getWartosc()
        ];

        return new JsonResponse($voucherObj);
    }


    /**
     * @Route("/ticket/{id<[1-9]\d*>?}", name="ticket", methods={"GET", "POST"})
     */
    function createTicket($id, Request $request)
    {
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            if (AppController::logoutOnSessionLifetimeEnd($this->get('session'))) {
                return $this->redirectToRoute('workers_app/logout_page');
            }
            $entityManager = $this->getDoctrine()->getManager();
            $tickets = $entityManager->getRepository(Bilety::class)->getTickets(4704);
            $snappy = $this->get('knp_snappy.pdf');
            $html = $this->renderView('workersApp/ticket/ticket.html.twig', ['bilety' => $tickets]);
            return new Response(
                $snappy->getOutputFromHtml($html),
                200,
                array(
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="ticket.pdf"'
                )
            );
        }
    }
}