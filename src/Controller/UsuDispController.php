<?php

namespace App\Controller;

use App\Entity\UsuDisp;
use App\Form\UsuDispType;
use App\Repository\UsuDispRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/usu/disp")
 */
class UsuDispController extends AbstractController
{
    /**
     * @Route("/", name="usu_disp_index", methods={"GET"})
     */
    public function index(UsuDispRepository $usuDispRepository): Response
    {
        return $this->render('usu_disp/index.html.twig', [
            'usu_disps' => $usuDispRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="usu_disp_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $usuDisp = new UsuDisp();
        $form = $this->createForm(UsuDispType::class, $usuDisp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuDisp);
            $entityManager->flush();

            return $this->redirectToRoute('usu_disp_index');
        }

        return $this->render('usu_disp/new.html.twig', [
            'usu_disp' => $usuDisp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usu_disp_show", methods={"GET"})
     */
    public function show(UsuDisp $usuDisp): Response
    {
        return $this->render('usu_disp/show.html.twig', [
            'usu_disp' => $usuDisp,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="usu_disp_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UsuDisp $usuDisp): Response
    {
        $form = $this->createForm(UsuDispType::class, $usuDisp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usu_disp_index');
        }

        return $this->render('usu_disp/edit.html.twig', [
            'usu_disp' => $usuDisp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usu_disp_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UsuDisp $usuDisp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$usuDisp->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($usuDisp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('usu_disp_index');
    }
}
