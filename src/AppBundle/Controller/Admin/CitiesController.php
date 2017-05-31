<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\CitiesType;
use AppBundle\Entity\AppCities;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CitiesController extends  Controller
{
    public function indexAction()
    {
        $em        = $this->getDoctrine()->getManager();
        $cities = $em->getRepository(AppCities::class)->findAll();

        return $this->render('@App/admin/cities/index.html.twig', array(
            'cities' => $cities
        ));
    }

    public function createAction(Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $citi = new AppCities();
        $form = $this->createForm(CitiesType::class, $citi);

        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($citi);
                $em->flush();
            }

            return $this->redirectToRoute('admin_cities');
        }

        return $this->render('@App/admin/cities/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $citi = $em->getRepository(AppCities::class)->find($id);

        // proveravamo da li grad sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($citi)) {
            throw new NotFoundHttpException('Grad sa id brojem:' . $id . ' nije pronađena.');
        }

        /**
        *  ovde kreiramo formu i kazemo da Symfony napuni formu preko metode setData
        *  sa podacima koje je dobila od grada koju smo izvukli iz baze po ID-ju.
        */
        $form = $this->createForm(CitiesType::class, $citi);
        $form->setData($citi);

        /**
         * Proveravamo da li je Request POST
         * A metoda handleRequest submit-uje formu
         */
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();

                /** Grad je uspesno azuriran sad radimo redirekt nazad na listu svih  gradova */
                return $this->redirectToRoute('admin_cities');
            }

        }

        return $this->render('@App/admin/cities/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $citi = $em->getRepository(AppCities::class)->find($id);

        // proveravamo da li grad sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($citi)) {
            throw new NotFoundHttpException('Grad sa id brojem:' . $id . ' nije pronađen.');
        }

        $em->remove($citi);
        $em->flush();

        /** Grad je uspesno obrisan sad radimo redirekt nazad na listu svih  gradova */
        return $this->redirectToRoute('admin_cities');
    }
}