<?php

namespace App\Controller\Admin;

use App\Entity\Alternative;
use App\Form\AlternativeType;
use App\Repository\AlternativeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/alternative")
 */
class AdminAlternativeController extends AbstractController
{
    /**
     * @Route("/", name="admin.alternative.index", methods={"GET"})
     */
    public function index(AlternativeRepository $alternativeRepository): Response
    {
        return $this->render('admin/alternative/index.html.twig', [
            'alternatives' => $alternativeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin.alternative.new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $alternative = new Alternative();
        $form = $this->createForm(AlternativeType::class, $alternative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($alternative);
            $entityManager->flush();

            return $this->redirectToRoute('admin.alternative.index');
        }

        return $this->render('admin/alternative/new.html.twig', [
            'alternative' => $alternative,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin.alternative.edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Alternative $alternative): Response
    {
        $form = $this->createForm(AlternativeType::class, $alternative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin.alternative.index', [
                'id' => $alternative->getId(),
            ]);
        }

        return $this->render('admin/alternative/edit.html.twig', [
            'alternative' => $alternative,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin.alternative.delete", methods={"DELETE"})
     */
    public function delete(Request $request, Alternative $alternative): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alternative->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($alternative);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin.alternative.index');
    }
}
