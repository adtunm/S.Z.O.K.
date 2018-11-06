<?php

namespace App\Controller\WorkersApp;

use App\Entity\Role;
use App\Entity\Pracownicy;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class EmployeeControler extends AbstractController
{
    /**
     * @Route("/workersApp/employees/new", name="workers_app/employees/new")
     */

    public function addEmployee(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $pracownik = new Pracownicy();
            $pracownik->setLogin("");
            $pracownik->setHaslo("");
            $pracownik->setImie("");
            $pracownik->setNazwisko("");
            $pracownik->setEmail("");
            $pracownik->setTelefon("");
            $form = $this->createFormBuilder($pracownik)
                ->add('role', EntityType::class, array(
                    'class' => Role::class,
                    'label' => "Rola: ",
                    'expanded' => false,
                    'multiple' => false,
                    'attr' => array("class" => "form-control"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('login', TextType::class, array(
                    'label' => 'Login:',
                    'attr' => array('class' => 'form-control',
                        "pattern" => "[A-Za-z0-9-_]{5,45}",
                        "placeholder" => "Wprowadź login..",
                        'title' => 'Wymagane od 3 do 45 dużych/małych liter lub cyfr.',
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('haslo', TextType::class, array(
                    'label' => 'Hasło:',
                    'attr' => array('class' => 'form-control',
                        "pattern" => "[A-Za-z0-9-_]{3,45}",
                        'title' => 'Wymagane od 3 do 45 dużych/małych liter lub cyfr.',
                        'placeholder' => 'Wprowadź hasło..',
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('imie', TextType::class, array(
                    'label' => 'Imię:',
                    'attr' => array('class' => 'form-control',
                        "pattern" => "[A-ZŁŚ]+[a-ząęółśżźćń\s-_]{2,44}",
                        'title' => 'Wymagane od 3 do 45 liter i 1-sza duża litera',
                        'placeholder' => 'Wprowadź imię..',
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('nazwisko', TextType::class, array(
                    'label' => 'Nazwisko:',
                    'attr' => array('class' => 'form-control',
                        "pattern" => "[A-ZĄĘÓŁŚŻŹĆŃ]+[a-zA-ZĄĘÓŁŚŻŹĆŃąęółśżźćń\-\s_]{2,44}",
                        'title' => 'Wprowadź Nazwisko,(wymagane od 3 do 45 znaków i 1-sza duża litera)',
                        'placeholder' => 'Wprwadź nazwisko..',
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('email', EmailType::class, array(
                    'label' => 'E-mail:',
                    'attr' => array('class' => 'form-control',
                        "placeholder"=>"Wprowdź email..",
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('telefon', TextType::class, array(
                    'label' => 'Telefon:',
                    'attr' => array("class" => "form-control",
                        "pattern" => "[0-9]{9}",
                        "title" => "Wprowadź numer telefonu(wymagane do 9 cyfr) ",
                        "placeholder" => 'Wprowadź numer telefonu..',
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'Dodaj nowego pracownika',
                    'attr' => array('class' => "btn btn-primary float-right")
                ))
                ->getForm();
            $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $var = $form->get('haslo')->getData();
                    $password = $passwordEncoder->encodePassword($pracownik, $var);
                    $pracownik->setHaslo($password);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($pracownik);
                    $entityManager->flush();

                    return $this->redirectToRoute('worker_app/employees/list');
                }

            return $this->render('workersApp/employees/new.html.twig', array('form' => $form->createView()));
        } else {
            if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
                return $this->render('workersApp/employees/permission.html.twig');
            else
                return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @Route("/workersApp/employees/{page?1}", name="worker_app/employees/list", requirements={"page"="\d+"}, methods={"GET"} )
     */
    public function list($page)
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_MANAGER')) {
            $pageLimit = $this->getParameter('page_limit');
            $pageCount = $this->getDoctrine()->getRepository(Pracownicy::class)->getPageCountOfActive($pageLimit);
            if ($page > $pageCount)
                return $this->redirectToRoute('worker_app/employees/list');
            else {
                $workerList = $this->getDoctrine()->getRepository(Pracownicy::class)->findActual($page, $pageLimit);
                return $this->render('workersApp/employees/list.html.twig', array('workerList' => $workerList, 'currentPage' => $page, 'pageCount' => $pageCount));
            }
        } else {
            if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
                return $this->render('workersApp/employees/permission.html.twig');
            else
                return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @Route("/workersApp/employees/show/{id}", name="workers_app/employees/show", methods={"GET"})
     */
    public function show($id)
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_MANAGER')) {
            $worker = $this->getDoctrine()->getRepository(Pracownicy::class)->find($id);
            return $this->render('workersApp/employees/show.html.twig', array('worker' => $worker));
        } else {
            if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
                return $this->render('workersApp/employees/permission.html.twig');
            else
                return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @Route("/workersApp/employees/edit/{id}", name="workers_app/employees/edit")
     */
    public function edit(Request $request, $id)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $pracownik = $this->getDoctrine()->getRepository(Pracownicy::class)->find($id);
            $form = $this->createFormBuilder($pracownik)
                ->remove('haslo')
                ->add('role', EntityType::class, array(
                    'class' => Role::class,
                    'label' => "Rola: ",
                    'expanded' => false,
                    'multiple' => false,
                    'attr' => array("class" => "form-control", 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('login', TextType::class, array(
                    'label' => 'Login:',
                    'attr' => array('class' => 'form-control',
                        "pattern" => "[A-Za-z0-9\-]{5,45}",
                        "placeholder" => "Wprowadź login..",
                        'title' => 'Wymagane od 3 do 45 dużych/małych liter lub cyfr.',
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('imie', TextType::class, array(
                    'label' => 'Imię:',
                    'attr' => array('class' => 'form-control',
                        "pattern" => "[A-ZŁŚ]{1}+[a-ząęółśżźćń]{2,44}",
                        'title' => 'Wymagane od 3 do 45 liter i 1-sza duża litera',
                        'placeholder' => 'Wprowadź imię..',
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('nazwisko', TextType::class, array(
                    'label' => 'Nazwisko:',
                    'attr' => array('class' => 'form-control',
                        "pattern" => "[A-ZĄĘÓŁŚŻŹĆŃ]{1}+[a-ząęółśżźćń\-\s]{2,44}",
                        'title' => 'Wprowadź Nazwisko,(wymagane od 3 do 45 znaków i 1-sza duża litera)',
                        'placeholder' => 'Wprwadź nazwisko..',
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('email', EmailType::class, array(
                    'label' => 'E-mail:',
                    'attr' => array('class' => 'form-control',
                        "placeholder"=>"Wprowdź email..",
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('telefon', TextType::class, array(
                    'label' => 'Telefon:',
                    'attr' => array("class" => "form-control",
                        "pattern" => "[0-9]{9}",
                        "title" => "Wprowadź numer telefonu(wymagane do 9 cyfr) ",
                        "placeholder" => 'Wprowadź numer telefonu..',
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'Edytuj pracownika',
                    'attr' => array('class' => "btn btn-primary float-right")
                ))
                ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                    $pracownik = $form->getData();
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->merge($pracownik);
                    $entityManager->flush();
                    return $this->redirectToRoute('worker_app/employees/list');
            }
            return $this->render('workersApp/employees/edit.html.twig', array('form' => $form->createView(), 'id' => $id));
        } else {
            if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
                return $this->render('workersApp/employees/permission.html.twig');
            else
                return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @Route("/workersApp/employees/delete/{id?}", name="workers_app/employees/delete", methods={"DELETE"})
     */
    public function delete($id)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $pracownik = $this->getDoctrine()->getRepository(Pracownicy::class)->find($id);
            $pracownik->setczyAktywny(0);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->merge($pracownik);
            $entityManager->flush();
            return $this->redirectToRoute('worker_app/employees/list');
        } else {
            if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
                return $this->render('workersApp/employees/permission.html.twig');
            else
                return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @Route("/workersApp/employees/changePassword/{id}", name="workers_app/employees/change_password")
     */
    public function changePassword(Request $request, $id, UserPasswordEncoderInterface $passwordEncoder)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $pracownik = $this->getDoctrine()->getRepository(Pracownicy::class)->find($id);
            $form = $this->createFormBuilder($pracownik)
                ->add('haslo', TextType::class, array(
                    'label' => 'Hasło: ',
                    'attr' => array('class' => 'form-control',
                        "pattern" => "[A-Za-z0-9]{3,45}",
                        'title' => 'Wprowadź hasło(wymagane od 3 do 45 znaków bez poslkich liter)',
                        'value' => "",
                        'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'Zmień hasło',
                    'attr' => array('class' => "btn btn-primary float-right")
                ))
                ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $var = $form->get('haslo')->getData();
                $password = $passwordEncoder->encodePassword($pracownik, $var);
                $pracownik->setHaslo($password);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($pracownik);
                $entityManager->flush();

                return $this->redirectToRoute('worker_app/employees/list');
            }
            return $this->render('workersApp/employees/changePassword.html.twig', array(
                'form' => $form->createView(), 'id' => $id
            ));
        } else {
            if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
                return $this->render('workersApp/employees/permission.html.twig');
            else
                return $this->redirectToRoute('workers_app/login_page');
        }
    }
}
