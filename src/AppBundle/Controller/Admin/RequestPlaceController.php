<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\RequestPlaceType;
use AppBundle\Entity\AppRequestPlace;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RequestPlaceController extends  Controller
{
    public function indexAction()
    {
        $em        = $this->getDoctrine()->getManager();
        $places = $em->getRepository(AppRequestPlace::class)->findAll();

        return $this->render('@App/admin/requestplace/index.html.twig', array(
            'requestplaces' => $places
        ));
    }

    public function createAction(Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $place = new AppRequestPlace();
        $form = $this->createForm(RequestPlaceType::class, $place);

        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($place);
                $em->flush();
            }

            return $this->redirectToRoute('admin_requestplace');
        }

        return $this->render('@App/admin/requestplace/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $place = $em->getRepository(AppRequestPlace::class)->find($id);

        // proveravamo da li mesto sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($place)) {
            throw new NotFoundHttpException('Mesto sa id brojem:' . $id . ' nije pronađeno.');
        }

        /**
        *  ovde kreiramo formu i kazemo da Symfony napuni formu preko metode setData
        *  sa podacima koje je dobila od mesta koju smo izvukli iz baze po ID-ju.
        */
        $form = $this->createForm(RequestPlaceType::class, $place);
        $form->setData($place);

        /**
         * Proveravamo da li je Request POST
         * A metoda handleRequest submit-uje formu
         */
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();

                /** Mesto je uspesno azurirana sad radimo redirekt nazad na listu svih  mesta */
                return $this->redirectToRoute('admin_requestplace');
            }

        }

        return $this->render('@App/admin/requestplace/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $place = $em->getRepository(AppRequestPlace::class)->find($id);

        // proveravamo da li mesto sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($place)) {
            throw new NotFoundHttpException('Mesto sa id brojem:' . $id . ' nije pronađeno.');
        }

        $em->remove($place);
        $em->flush();

        /** Mesto je uspesno obrisano sad radimo redirekt nazad na listu svih  mesta */
        return $this->redirectToRoute('admin_requestplace');
    }
}