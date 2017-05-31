<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\CountryType;
use AppBundle\Entity\AppCountry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CountryController extends  Controller
{
    public function indexAction()
    {
        $em        = $this->getDoctrine()->getManager();
        $countries = $em->getRepository(AppCountry::class)->findAll();

        return $this->render('@App/admin/country/index.html.twig', array(
            'countries' => $countries
        ));
    }

    public function createAction(Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $country = new AppCountry();
        $form = $this->createForm(CountryType::class, $country);

        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($country);
                $em->flush();
            }

            return $this->redirectToRoute('admin_countries');
        }

        return $this->render('@App/admin/country/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $country = $em->getRepository(AppCountry::class)->find($id);

        // proveravamo da li drazava sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($country)) {
            throw new NotFoundHttpException('Država sa id brojem:' . $id . ' nije pronađena.');
        }

        /**
        *  ovde kreiramo formu i kazemo da Symfony napuni formu preko metode setData
        *  sa podacima koje je dobila od drzave koju smo izvukli iz baze po ID-ju.
        */
        $form = $this->createForm(CountryType::class, $country);
        $form->setData($country);

        /**
         * Proveravamo da li je Request POST
         * A metoda handleRequest submit-uje formu
         */
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();

                /** Drzava je uspesno azurirana sad radimo redirekt nazad na listu svih  drzava */
                return $this->redirectToRoute('admin_countries');
            }

        }

        return $this->render('@App/admin/country/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $country = $em->getRepository(AppCountry::class)->find($id);

        // proveravamo da li drazava sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($country)) {
            throw new NotFoundHttpException('Država sa id brojem:' . $id . ' nije pronađena.');
        }

        $em->remove($country);
        $em->flush();

        /** Drzava je uspesno obrisana sad radimo redirekt nazad na listu svih  drzava */
        return $this->redirectToRoute('admin_countries');
    }
}