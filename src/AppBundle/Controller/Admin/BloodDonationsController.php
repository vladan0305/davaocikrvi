<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\BloodDonationsType;
use AppBundle\Entity\AppBloodDonations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BloodDonationsController extends  Controller
{
    public function indexAction()
    {
        $em        = $this->getDoctrine()->getManager();
        $bloodDonations = $em->getRepository(AppBloodDonations::class)->findAll();

        return $this->render('@App/admin/blooddonations/index.html.twig', array(
            'blooddonations' => $bloodDonations
        ));
    }

    public function createAction(Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $bloodDonation = new AppBloodDonations();
        $form = $this->createForm(BloodDonationsType::class, $bloodDonation);

        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($bloodDonation);
                $em->flush();
            }

            return $this->redirectToRoute('admin_blooddonations');
        }

        return $this->render('@App/admin/blooddonations/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $bloodDonation = $em->getRepository(AppBloodDonations::class)->find($id);

        // proveravamo da li donacija sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($bloodDonation)) {
            throw new NotFoundHttpException('Donacija sa id brojem:' . $id . ' nije pronađena.');
        }

        /**
        *  ovde kreiramo formu i kazemo da Symfony napuni formu preko metode setData
        *  sa podacima koje je dobila od donacije koju smo izvukli iz baze po ID-ju.
        */
        $form = $this->createForm(BloodDonationsType::class, $bloodDonation);
        $form->setData($bloodDonation);

        /**
         * Proveravamo da li je Request POST
         * A metoda handleRequest submit-uje formu
         */
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();

                /** Donacija je uspesno azurirana sad radimo redirekt nazad na listu svih  donacija */
                return $this->redirectToRoute('admin_blooddonations');
            }

        }

        return $this->render('@App/admin/blooddonations/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $bloodDonation = $em->getRepository(AppBloodDonations::class)->find($id);

        // proveravamo da li donacija sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($bloodDonation)) {
            throw new NotFoundHttpException('Donacija sa id brojem:' . $id . ' nije pronađena.');
        }

        $em->remove($bloodDonation);
        $em->flush();

        /** Donacija je uspesno obrisana sad radimo redirekt nazad na listu svih  donacija */
        return $this->redirectToRoute('admin_blooddonations');
    }
}