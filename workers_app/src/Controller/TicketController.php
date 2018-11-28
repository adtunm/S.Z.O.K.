<?php
/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 19.11.2018
 * Time: 11:18
 */

namespace App\Controller;


use App\Entity\PulabiletowMaRodzajebiletow;
use App\Entity\Pulebiletow;
use App\Entity\Rodzajebiletow;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class TicketController extends AbstractController
{
    /**
     * @Route("/tickets/pools/show/{id}",
     *      name="workers_app/tickets/pools/show")
     */
    public function poolsHaveTypesOfTickets($id)
    {

        $pmr = $this->getDoctrine()->getRepository(PulabiletowMaRodzajebiletow::class)->findBy(array('pulebiletow' => $id));
        $query = $this->getDoctrine()->getRepository(Pulebiletow::class)->find($id);
        $pula['nazwa'] = $query->getNazwa();
        $pula['status'] = $query->getUsunieto();
        $pula['id'] = $query->getID();
        if ($pula['status'] == null)
            $pula['status'] = true;
        return $this->render('workersApp\tickets\list.html.twig', array('query' => $pmr, 'pula' => $pula));
    }

    /**
     * @Route("/t/pools/add",
     *      name="workers_app/tickets/pools/add",
     *      methods={"GET|POST"})
     */
    public function add(Request $request)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $rodzajeBiletow = $this->getDoctrine()->getRepository(Rodzajebiletow::class)->findAllActive();
            $nowaPula = new Pulebiletow();

            $form = $this->createFormBuilder($nowaPula)
                ->add('nazwa', TextType::class, array(
                    'attr' => array("class" => "form-control ",
                        'pattern' => '[A-Za-z0-9\-ĘÓĄŚŁŻŹĆŃęąśłżźćń ]{3,45}',
                        'title' => 'Polskie litery, cyfry, spacje i myślniki, od 3 do 45 znaków',
                        'autocomplete' => "off"),
                    'csrf_protection' => false,
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'Zapisz',
                    'attr' => array('class' => 'btn btn-primary float-right', "style" => "margin-right:-15px;")
                ))
                ->getForm();

            $form->handleRequest($request);


            $error = array();
            $wartosci = array();

            foreach ($rodzajeBiletow as $id => $nazwa) {
                if (!isset($wartosci[$id])) {
                    array_push($wartosci, array(
                        'idRodzajBiletu' => $nazwa->getId(),
                        'nazwa' => $nazwa->getNazwa(),
                        'cena' => ''));
                }
            }
            if ($form->isSubmitted()) {
                $prizes = $request->get('form_price');
                foreach ($prizes as $key => $value) {
                    $wartosci[$key] = array(
                        'idRodzajBiletu' => $key,
                        'nazwa' => $wartosci[$key]['nazwa'],
                        'cena' => $value);
                }
            }

            if ($form->isSubmitted() && $form->isValid()) {
                if ($prizes and $keep = $request->get('form_keep')) {
                    foreach ($prizes as $key => $value) {
                        if (!preg_match('/^\d+(?:\.\d{2})?$/', $value)) {
                            array_push($error, array('pattern' => 'Podana wartość jest nieprawidłowa.', 'id' => $key));
                        } else if ($value <= 0) {
                            array_push($error, array('wartosc' => 'Podana wartość musi być liczbą większą od 0', 'id' => $key));
                        }
                    }
                    if (!$error) {
                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($nowaPula);
                        $entityManager->flush();
                        foreach ($keep as $key => $value) {
                            $pulaMaRodzaj = new PulabiletowMaRodzajebiletow();
                            $pulaMaRodzaj->setCena($prizes[$key]);
                            $pulaMaRodzaj->setRodzajebiletow($this->getDoctrine()->getRepository(Rodzajebiletow::class)->find($key));
                            $pulaMaRodzaj->setPulebiletow($nowaPula);
                            $entityManager = $this->getDoctrine()->getManager();
                            $entityManager->persist($pulaMaRodzaj);
                            $entityManager->flush();
                        }
                        return $this->redirectToRoute('workers_app/tickets/dictionaryName', array('dictionaryName' => 'pools'));
                    }
                    return $this->render('workersApp/tickets/add.html.twig', array(
                        'form' => $form->createView(),
                        'errors' => $error,
                        'wartosci' => $wartosci));
                }
            }

            return $this->render('workersApp/tickets/add.html.twig', array(
                'form' => $form->createView(),
                'errors' => $error,
                'wartosci' => $wartosci));
        } else {
            if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
                return $this->redirectToRoute('workers_app/no_permission');
            else
                return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @Route("/t/pools/edit/{id}",
     *      name="workers_app/tickets/pools/edit",
     *      methods={"GET|POST"})
     */

    public function edit(Request $request, $id)
    {
        {
            if ($this->isGranted('ROLE_ADMIN')) {
                $rodzajeBiletow = $this->getDoctrine()->getRepository(Rodzajebiletow::class)->findAllActive();
                $Pula = $this->getDoctrine()->getRepository(Pulebiletow::class)->find($id);

                $form = $this->createFormBuilder($Pula)
                    ->add('nazwa', TextType::class, array(
                        'attr' => array("class" => "form-control ",
                            'pattern' => '[A-Za-z0-9\-ĘÓĄŚŁŻŹĆŃęąśłżźćń ]{3,45}',
                            'title' => 'Polskie litery, cyfry, spacje i myślniki, od 3 do 45 znaków',
                            'autocomplete' => "off"),
                        'csrf_protection' => false,
                        'label_attr' => array('class' => "col-sm-2 col-form-label")
                    ))
                    ->add('save', SubmitType::class, array(
                        'label' => 'Zapisz',
                        'attr' => array('class' => 'btn btn-primary float-right', "style" => "margin-right:-15px;")
                    ))
                    ->getForm();
                $prices = array();
                $wartosci = array();
                $error = array();
                $bilety = $this->getDoctrine()->getRepository(PulabiletowMaRodzajebiletow::class)->findBy(array('pulebiletow' => $id));
                foreach ($bilety as $id => $nazwa) {
                    if (!isset($wartosci[$id])) {
                        array_push($wartosci, array(
                            'idRodzajBiletu' => $nazwa->getRodzajebiletow()->getId(),
                            'nazwa' => $nazwa->getRodzajebiletow()->getNazwa(),
                            'cena' => $nazwa->getCena(),
                            'idPMR' => $nazwa->getId()));
                    }
                }
                foreach ($rodzajeBiletow as $id => $nazwa) {
                    if (!isset($wartosci[$id])) {
                        array_push($wartosci, array(
                            'idRodzajBiletu' => $nazwa->getId(),
                            'nazwa' => $nazwa->getNazwa(),
                            'cena' => '',
                            'idPMR' => ''));
                    }
                    if (!isset($prices[$id])) {
                        array_push($prices, array(
                            $id => ''));
                    }
                }

                $form->handleRequest($request);

                if ($form->isSubmitted()) {
                    $prices = $request->get('form_price');
                    foreach ($rodzajeBiletow as $id => $nazwa) {
                        if (!isset($prices[$nazwa->getId()])) {
                            $prices[$nazwa->getId()]='';
                        }
                    }
                    foreach ($rodzajeBiletow as $id => $nazwa) {
                        foreach ($prices as $key => $value) {
                            if ($wartosci[$id]['idRodzajBiletu'] == $key) {
                                $wartosci[$id]=array_replace($wartosci[$id], array('cena' => $value));
                            }
                        }
                    }
                }



                if ($form->isSubmitted() && $form->isValid()) {
                    if ($prices and $keep = $request->get('form_keep')) {
                        foreach ($prices as $key => $value) {
                            if (!preg_match('/^\d+(?:\.\d{2})?$/', $value)) {
                                array_push($error, array('pattern' => 'Podana wartość jest nieprawidłowa.', 'id' => $key));
                            } else if ($value <= 0) {
                                array_push($error, array('wartosc' => 'Podana wartość musi być liczbą większą od 0', 'id' => $key));
                            }
                        }
                        if (!$error) {
                            $entityManager = $this->getDoctrine()->getManager();
                            $entityManager->persist($Pula);
                            $entityManager->flush();
                            foreach ($keep as $key => $value) {
                                $pulaMaRodzaj = new PulabiletowMaRodzajebiletow();
                                $pulaMaRodzaj->setCena($prices[$key]);
                                $pulaMaRodzaj->setRodzajebiletow($this->getDoctrine()->getRepository(Rodzajebiletow::class)->find($key));
                                $pulaMaRodzaj->setPulebiletow($Pula);
                                $entityManager = $this->getDoctrine()->getManager();
                                $entityManager->persist($pulaMaRodzaj);
                                $entityManager->flush();
                            }
                            return $this->redirectToRoute('workers_app/tickets/dictionaryName', array('dictionaryName' => 'pools'));
                        }
                        return $this->render('workersApp/tickets/add.html.twig', array('form' => $form->createView(), 'ticketTypes' => $rodzajeBiletow, 'errors' => $error, 'wartosci' => $wartosci));
                    }
                }

                return $this->render('workersApp/tickets/add.html.twig', array('form' => $form->createView(), 'ticketTypes' => $rodzajeBiletow, 'errors' => $error, 'wartosci' => $wartosci));
            } else {
                if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
                    return $this->redirectToRoute('workers_app/no_permission');
                else
                    return $this->redirectToRoute('workers_app/login_page');
            }
        }
    }
}