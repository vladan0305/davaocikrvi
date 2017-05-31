<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\RequestType;
use AppBundle\Entity\AppRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RequestController extends  Controller
{
    public function indexAction()
    {
        $em        = $this->getDoctrine()->getManager();
        $reqs = $em->getRepository(AppRequest::class)->findAll();

        return $this->render('@App/admin/request/index.html.twig', array(
            'requests' => $reqs
        ));
    }

    public function createAction(Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $req = new AppRequest();
        $form = $this->createForm(RequestType::class, $req);

        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($req);
                $em->flush();
            }

            return $this->redirectToRoute('admin_requests');
        }

        return $this->render('@App/admin/request/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $req = $em->getRepository(AppRequest::class)->find($id);

        // proveravamo da li zahtev sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($req)) {
            throw new NotFoundHttpException('Zahtev sa id brojem:' . $id . ' nije pronađen.');
        }

        /**
        *  ovde kreiramo formu i kazemo da Symfony napuni formu preko metode setData
        *  sa podacima koje je dobila od zahteva koju smo izvukli iz baze po ID-ju.
        */
        $form = $this->createForm(RequestType::class, $req);
        $form->setData($admin);

        /**
         * Proveravamo da li je Request POST
         * A metoda handleRequest submit-uje formu
         */
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();

                /** Zahtev je uspesno azuriran sad radimo redirekt nazad na listu svih  zahteva */
                return $this->redirectToRoute('admin_requests');
            }

        }

        return $this->render('@App/admin/request/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $req = $em->getRepository(AppRequest::class)->find($id);

        // proveravamo da li zahtev sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($req)) {
            throw new NotFoundHttpException('Zahtev sa id brojem:' . $id . ' nije pronađen.');
        }

        $em->remove($req);
        $em->flush();

        /** Zahtev je uspesno obrisan sad radimo redirekt nazad na listu svih  zahteva */
        return $this->redirectToRoute('admin_requests');
    }
}