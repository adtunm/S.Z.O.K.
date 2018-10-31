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


class WorkersController extends AbstractController
{
    /**
     * @Route("/workersApp/pracownicy/dodaj", name="workers_app/manage/new")
     */

    public function addWorker_page(Request $request, UserPasswordEncoderInterface $passwordEncoder, ValidatorInterface $validator)
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
                    'attr' => array('class' => 'form-control', "pattern" => "[A-Za-z0-9]{3,45}", 'title' => 'Wprowadź login(wymagane od 3 do 45 znaków bez poslkich liter)', 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('haslo', TextType::class, array(
                    'label' => 'Hasło:',
                    'attr' => array('class' => 'form-control', "pattern" => "[A-Za-z0-9]{3,45}", 'title' => 'Wprowadź hasło(wymagane od 3 do 45 znaków bez poslkich liter)', 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('imie', TextType::class, array(
                    'label' => 'Imię:',
                    'attr' => array('class' => 'form-control', "pattern" => "[A-ZŁŚ]{1}+[a-ząęółśżźćń]{2,44}", 'title' => 'Wprowadź Imie,(wymagane od 3 do 45 znaków i 1-sza duża litera)', 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('nazwisko', TextType::class, array(
                    'label' => 'Nazwisko:',
                    'attr' => array('class' => 'form-control', "pattern" => "[A-ZĄĘÓŁŚŻŹĆŃ]{1}+[a-ząęółśżźćń-]{2,44}", 'title' => 'Wprowadź Nazwisko,(wymagane od 3 do 45 znaków i 1-sza duża litera)', 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('email', EmailType::class, array(
                    'label' => 'E-mail:',
                    'attr' => array('class' => 'form-control'),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('telefon', TextType::class, array(
                    'label' => 'Telefon:',
                    'attr' => array("class" => "form-control", "pattern" => "[0-9]{1,9}", "title" => "Wprowadź numer telefonu(wymagane do 9 cyfr) ", 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'Dodaj nowego pracownika',
                    'attr' => array('class' => "btn btn-primary float-right")
                ))
                ->getForm();
            $form->handleRequest($request);
            $errors = array();
            if ($form->isSubmitted()) {
                $email = $form->get('email')->getData();
                $testEmail = $this->getDoctrine()->getRepository(Pracownicy::class)->checkEmail($email);
                $telefon = $form->get('telefon')->getData();
                $testTelefon = $this->getDoctrine()->getRepository(Pracownicy::class)->checkTelefon($telefon);
                $login = $form->get('login')->getData();
                $testLogin = $this->getDoctrine()->getRepository(Pracownicy::class)->checkLogin($login);
                $x = -1;
                if ($email == $testEmail) {
                    $errors[$x += 1] = array('error' => 'Ten E-mail jest już zajęty');
                }
                if ($telefon == $testTelefon) {
                    $errors[$x += 1] = array('error' => 'Ten telefon jest już zajęty');
                }
                if ($login == $testLogin) {
                    $errors[$x += 1] = array('error' => 'Ten login jest już zajęty');
                }

                if (!$errors) {
                    $var = $form->get('haslo')->getData();
                    $password = $passwordEncoder->encodePassword($pracownik, $var);
                    $pracownik->setHaslo($password);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($pracownik);
                    $entityManager->flush();

                    return $this->redirectToRoute('worker_app/pracownicy/list');
                }
            }
            return $this->render('workersApp/manage/new.html.twig', array(
                'form' => $form->createView(), 'errors' => $errors
            ));
        } else {
            return $this->render('workersApp/manage/permission.html.twig');
        }
    }

    /**
     * @Route("/workersApp/pracownicy/{page?1}", name="worker_app/pracownicy/list", requirements={"page"="\d+"} )
     */
    public function list($page)
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_MANAGER')) {
            $workerList = $this->getDoctrine()->getRepository(Pracownicy::class)->findAll();
            return $this->render('workersApp/manage/list.html.twig', array('workerList' => $workerList, 'page' => $page - 1));
        } else {
            return $this->render('workersApp/manage/permission.html.twig');
        }
    }

    /**
     * @Route("/workersApp/pracownicy/show/{id}", name="workers_app/pracownicy/show", methods={"GET"})
     */
    public function show($id)
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_MANAGER')) {
            $worker = $this->getDoctrine()->getRepository(Pracownicy::class)->find($id);
            return $this->render('workersApp/manage/show.html.twig', array('worker' => $worker));
        } else {
            return $this->render('workersApp/manage/permission.html.twig');
        }
    }

    /**
     * @Route("/workersApp/pracownicy/edytuj/{id}", name="workers_app/pracownicy/edit")
     */
    public function edit(Request $request, $id)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $pracownik = $this->getDoctrine()->getRepository(Pracownicy::class)->find($id);
            $form = $this->createFormBuilder($pracownik)
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
                    'attr' => array('class' => 'form-control', "pattern" => "[A-Za-z0-9]{3,45}", 'title' => 'Wprowadź login(wymagane od 3 do 45 znaków bez poslkich liter)', 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('imie', TextType::class, array(
                    'label' => 'Imię: ',
                    'attr' => array('class' => 'form-control', "pattern" => "[A-ZŁŚ]{1}+[a-ząęółśżźćń]{2,44}", 'title' => 'Wprowadź Imie,(wymagane od 3 do 45 znaków i 1-sza duża litera)', 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('nazwisko', TextType::class, array(
                    'label' => 'Nazwisko: ',
                    'attr' => array('class' => 'form-control', "pattern" => "[A-ZĄĘÓŁŚŻŹĆŃ]{1}+[a-ząęółśżźćń-]{2,44}", 'title' => 'Wprowadź Nazwisko,(wymagane od 3 do 45 znaków i 1-sza duża litera)', 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('email', EmailType::class, array(
                    'label' => 'E-mail: ',
                    'attr' => array('class' => 'form-control', 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('telefon', TextType::class, array(
                    'label' => 'Telefon: ',
                    'attr' => array("class" => "form-control", "pattern" => "[0-9]{1,9}", "title" => "Wprowadź numer telefonu(wymagane do 9 cyfr) ", 'autocomplete' => "off"),
                    'label_attr' => array('class' => "col-sm-2 col-form-label")
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'Edytuj pracownika',
                    'attr' => array('class' => "btn btn-primary float-right")
                ))
                ->getForm();
            $oldEmail = $form->get('email')->getData();
            $oldTelefon = $form->get('telefon')->getData();
            $oldLogin = $form->get('login')->getData();
            $form->handleRequest($request);
            $errors = array();
            if ($form->isSubmitted()) {
                $email = $form->get('email')->getData();
                $testEmail = $this->getDoctrine()->getRepository(Pracownicy::class)->checkEmail($email);
                $telefon = $form->get('telefon')->getData();
                $testTelefon = $this->getDoctrine()->getRepository(Pracownicy::class)->checkTelefon($telefon);
                $login = $form->get('login')->getData();
                $testLogin = $this->getDoctrine()->getRepository(Pracownicy::class)->checkLogin($login);
                $x = -1;
                if ($oldEmail != $email) {
                    if ($email == $testEmail) {
                        $errors[$x += 1] = array('error' => 'Ten E-mail jest już zajęty');
                    }
                }
                if ($oldTelefon != $telefon) {
                    if ($telefon == $testTelefon) {
                        $errors[$x += 1] = array('error' => 'Ten telefon jest już zajęty');
                    }
                }
                if ($oldLogin != $login) {
                    if ($login == $testLogin) {
                        $errors[$x += 1] = array('error' => 'Ten login jest już zajęty');
                    }
                }
                if (!$errors) {
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($pracownik);
                    $entityManager->flush();
                    return $this->redirectToRoute('worker_app/pracownicy/list');
                }
            }
            return $this->render('workersApp/manage/edit.html.twig', array(
                'form' => $form->createView(), 'id' => $id, 'errors' => $errors
            ));
        } else {
            return $this->render('workersApp/manage/permission.html.twig');
        }
    }

    /**
     * @Route("/workersApp/pracownicy/usun/{id}", name="workers_app/pracownicy/delete")
     */
    public function delete($id)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $pracownik = $this->getDoctrine()->getRepository(Pracownicy::class)->find($id);
            $pracownik->setczyAktywny(0);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pracownik);
            $entityManager->flush();
            return $this->redirectToRoute('worker_app/pracownicy/list');
        } else {
            return $this->render('workersApp/manage/permission.html.twig');
        }
    }

    /**
     * @Route("/workersApp/pracownicy/zmienHaslo/{id}", name="workers_app/pracownicy/change_password")
     */
    public function changePassword(Request $request, $id, UserPasswordEncoderInterface $passwordEncoder)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $pracownik = $this->getDoctrine()->getRepository(Pracownicy::class)->find($id);
            $form = $this->createFormBuilder($pracownik)
                ->add('haslo', TextType::class, array(
                    'label' => 'Hasło: ',
                    'attr' => array('class' => 'form-control', "pattern" => "[A-Za-z0-9]{3,45}", 'title' => 'Wprowadź hasło(wymagane od 3 do 45 znaków bez poslkich liter)', 'value' => "", 'autocomplete' => "off"),
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

                return $this->redirectToRoute('worker_app/pracownicy/list');
            }
            return $this->render('workersApp/manage/delete.html.twig', array(
                'form' => $form->createView(), 'id' => $id
            ));
        } else {
            return $this->render('workersApp/manage/permission.html.twig'
            );
        }
    }
}
