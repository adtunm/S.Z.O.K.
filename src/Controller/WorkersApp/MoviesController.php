<?php
/**
 * Created by PhpStorm.
 * User: gnowa
 * Date: 18.11.2018
 * Time: 13:55
 */

namespace App\Controller\WorkersApp;

use App\Entity\Filmy;
use App\Entity\Kategoriewiekowe;
use App\Entity\Rodzajefilmow;
use App\Entity\Typyseansow;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MoviesController extends Controller
{
    /**
     * @Route("/movies/{page<[1-9]\d*>?1}", name="workers_app/movies", methods={"GET"})
     */
    public function index($page)
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            $pageLimit = $this->getParameter('page_limit');
            $pageCount = $this->getDoctrine()->getRepository(Filmy::class)->getPageCount($pageLimit);

            if($page > $pageCount and $pageCount != 0)
                return $this->redirectToRoute('workers_app/promotions');
            else {
                $movies = $this->getDoctrine()->getRepository(Filmy::class)->findPage($page, $pageLimit);
                return $this->render('workersApp/movies/list.html.twig', array('movies' => $movies, 'currentPage' => $page, 'pageCount' => $pageCount));
            }
        } else {
            return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @Route("/movies/new", name="workers_app/movies/new", methods={"GET", "POST"})
     */
    public function new(Request $request)
    {
        if($this->isGranted('ROLE_MANAGER') or $this->isGranted('ROLE_ADMIN')) {
            $movie = new Filmy();

            $form = $this->getForm($movie);

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                $movie = $form->getData();

//                $entityManager = $this->getDoctrine()->getManager();
//                $entityManager->persist($movie);
//                $entityManager->flush();

                return $this->redirectToRoute('workers_app/movies');
            } else {

                return $this->render('workersApp/movies/new.html.twig', array('form' => $form->createView()));
            }
        } else if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('workers_app/no_permission');
        } else {
            return $this->redirectToRoute('workers_app/login_page');
        }
    }

    /**
     * @param Filmy $movie
     * @return \Symfony\Component\Form\FormInterface
     */
    private function getForm(Filmy $movie)
    {
        return $this->createFormBuilder($movie)
            ->add('tytul', TextType::class, array(
                'label' => 'Tytuł:',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Wprowadź tytuł filmu...'
                )
            ))
            ->add('plakat', FileType::class, array(
                'label' => 'Plakat:',
                'required' => false,
                'multiple' => false,
                'attr' => array(
                    'accept' => 'image/*',
                    'onchange' => 'readURL(this);',
                    'class' => 'form-control-file bg-light text-dark'
                )
            ))
            ->add('datapremiery', DateType::class, array(
                'label' => 'Data premiery',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => array(
                    'class' => 'form-control col-xl-6 col-md-10 col-10',
                    'autocomplete' => 'off'
                ),
            ))
            ->add('kategoriewiekowe', EntityType::class, array(
                'class' => Kategoriewiekowe::class,
                'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->andWhere('d.usunieto = 0 OR d.usunieto IS NULL');
                },
                'label' => 'Kategoria wiekowa:',
                'expanded' => false,
                'multiple' => false,
                'attr' => array(
                    'class' => 'form-control col-xl-4 col-md-6 col-8'
                )
            ))
            ->add('czastrwania', IntegerType::class, array(
                'label' => 'Długość filmu:',
                'invalid_message' => 'Wartość musi być liczbą całkowitą',
                'attr' => array(
                    'class' => 'form-control col-xl-4 col-md-6 col-8',
                    'autocomplete' => 'off'
                )
            ))
            ->add('czasreklam', IntegerType::class, array(
                'label' => 'Długość reklam:',
                'invalid_message' => 'Wartość musi być liczbą całkowitą',
                'attr' => array(
                    'class' => 'form-control col-xl-4 col-md-6 col-8',
                    'autocomplete' => 'off'
                )
            ))
            ->add('typyseansow', EntityType::class, array(
                'class' => Typyseansow::class,
                'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->andWhere('d.usunieto = 0 OR d.usunieto IS NULL');
                },
                'label' => 'Dostępne formaty:',
                'expanded' => true,
                'multiple' => true,
                'attr' => array(
                    'class' => 'checkboxes-group'
                )
            ))
            ->add('rodzajefilmow', EntityType::class, array(
                'class' => Rodzajefilmow::class,
                'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->andWhere('d.usunieto = 0 OR d.usunieto IS NULL');
                },
                'required' => true,
                'label' => 'Gatunki:',
                'expanded' => true,
                'multiple' => true,
                'attr' => array(
                    'class' => 'checkboxes-group'
                )
            ))
            ->add('opis', TextareaType::class, array(
                'label' => 'Opis:',
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Wprowadź opis filmu...'
                )
            ))
            ->add('zwiastun', TextType::class, array(
                'label' => 'Zwiastun:',
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Wklej link do zwiastuna...'
                )
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'Zapisz',
                'attr' => array('class' => 'btn btn-primary')
            ))
            ->getForm();
    }
}