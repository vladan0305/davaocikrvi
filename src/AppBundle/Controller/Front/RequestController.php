<?php

namespace AppBundle\Controller\Front;

use AppBundle\Form\front\RequestType;
use AppBundle\Entity\AppRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RequestController extends Controller
{
   
    public function requestAction(Request $request) {
        
        $em      = $this->getDoctrine()->getManager();
        $bloodrequest = new AppRequest();
        $form = $this->createForm(RequestType::class, $bloodrequest);
        
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($bloodrequest);
                $em->flush();
            }
            return $this->redirectToRoute('blood_request');
        }
        
        return $this->render('@App/front/request/request.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
