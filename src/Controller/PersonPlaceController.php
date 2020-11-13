<?php

namespace App\Controller;

use App\Entity\PersonPlace;
use App\Form\PersonPlaceType;
use App\Repository\PersonPlaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/person_place")
 */
class PersonPlaceController extends AbstractController
{
    /**
     * @Route("/", name="person_place_index", methods={"GET"})
     */
    public function index(PersonPlaceRepository $personPlaceRepository): Response
    {
        return $this->render('person_place/index.html.twig', [
            'person_places' => $personPlaceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="person_place_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $personPlace = new PersonPlace();
        $form = $this->createForm(PersonPlaceType::class, $personPlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personPlace);
            $entityManager->flush();

            return $this->redirectToRoute('person_place_index');
        }

        return $this->render('person_place/new.html.twig', [
            'person_place' => $personPlace,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="person_place_show", methods={"GET"})
     */
    public function show(PersonPlace $personPlace): Response
    {
        return $this->render('person_place/show.html.twig', [
            'person_place' => $personPlace,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="person_place_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PersonPlace $personPlace): Response
    {
        $form = $this->createForm(PersonPlaceType::class, $personPlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('person_place_index');
        }

        return $this->render('person_place/edit.html.twig', [
            'person_place' => $personPlace,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="person_place_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PersonPlace $personPlace): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personPlace->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($personPlace);
            $entityManager->flush();
        }

        return $this->redirectToRoute('person_place_index');
    }
}
