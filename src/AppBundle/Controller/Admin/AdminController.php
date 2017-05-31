<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\AdminType;
use AppBundle\Entity\AppAdmin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdminController extends  Controller
{
    public function indexAction()
    {
        $em        = $this->getDoctrine()->getManager();
        $admins = $em->getRepository(AppAdmin::class)->findAll();

        return $this->render('@App/admin/admin/index.html.twig', array(
            'admins' => $admins
        ));
    }

    public function createAction(Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $admin = new AppAdmin();
        $form = $this->createForm(AdminType::class, $admin);

        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($admin);
                $em->flush();
            }

            return $this->redirectToRoute('admin_admins');
        }

        return $this->render('@App/admin/admin/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $admin = $em->getRepository(AppAdmin::class)->find($id);

        // proveravamo da li administrator sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($admin)) {
            throw new NotFoundHttpException('Administrator sa id brojem:' . $id . ' nije pronađen.');
        }

        /**
        *  ovde kreiramo formu i kazemo da Symfony napuni formu preko metode setData
        *  sa podacima koje je dobila od administratora koju smo izvukli iz baze po ID-ju.
        */
        $form = $this->createForm(AdminType::class, $admin);
        $form->setData($admin);

        /**
         * Proveravamo da li je Request POST
         * A metoda handleRequest submit-uje formu
         */
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();

                /** Administrator je uspesno azuriran sad radimo redirekt nazad na listu svih  administratora */
                return $this->redirectToRoute('admin_admins');
            }

        }

        return $this->render('@App/admin/admin/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $admin = $em->getRepository(AppAdmin::class)->find($id);

        // proveravamo da li administrator sa tim id-jem postoji ukoliko ne postoji bacamo gresku
        if (empty($admin)) {
            throw new NotFoundHttpException('Administrator sa id brojem:' . $id . ' nije pronađen.');
        }

        $em->remove($admin);
        $em->flush();

        /** Administrator je uspesno obrisan sad radimo redirekt nazad na listu svih  administratora */
        return $this->redirectToRoute('admin_admins');
    }
}