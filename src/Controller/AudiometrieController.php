<?php

namespace App\Controller;

use App\Entity\Audiometrie;
use App\Form\AudiometrieType;
use App\Repository\AudiometrieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AudiometrieController extends AbstractController
{
    /**
     * @Route("/index", name="app_audiometrie_index", methods={"GET"})
     */
    public function index(AudiometrieRepository $audiometrieRepository): Response
    {
        return $this->render('audiometrie/index.html.twig', [
            'audiometries' => $audiometrieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/", name="app_audiometrie_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AudiometrieRepository $audiometrieRepository): Response
    {
        $audiometrie = new Audiometrie();
        $form = $this->createForm(AudiometrieType::class, $audiometrie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $audiometrieRepository->add($audiometrie);
            return $this->redirectToRoute('app_audiometrie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('audiometrie/new.html.twig', [
            'audiometrie' => $audiometrie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_audiometrie_show", methods={"GET"})
     */
    public function show(Audiometrie $audiometrie): Response
    {
        return $this->render('audiometrie/show.html.twig', [
            'audiometrie' => $audiometrie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_audiometrie_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Audiometrie $audiometrie, AudiometrieRepository $audiometrieRepository): Response
    {
        $form = $this->createForm(AudiometrieType::class, $audiometrie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $audiometrieRepository->add($audiometrie);
            return $this->redirectToRoute('app_audiometrie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('audiometrie/edit.html.twig', [
            'audiometrie' => $audiometrie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_audiometrie_delete", methods={"POST"})
     */
    public function delete(Request $request, Audiometrie $audiometrie, AudiometrieRepository $audiometrieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$audiometrie->getId(), $request->request->get('_token'))) {
            $audiometrieRepository->remove($audiometrie);
        }

        return $this->redirectToRoute('app_audiometrie_index', [], Response::HTTP_SEE_OTHER);
    }
}
