<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\Type\RegistrationType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/registration", name="registrationpage")
     */  
    public function providerRegisterAction(Request $request) {
        
        $user = new User();  
        $form = $this->createForm(RegistrationType::class, $user);  
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {           
            $user = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $url = $this->generateUrl('successpage');
            $response = new RedirectResponse($url);
            return $response;
        }
        
        return $this->render('AppBundle:Registration:registration.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
    
    
    /**
     * @Route("/success", name="successpage")
     */
    public function successAction()
    {
        return $this->render('default/success.html.twig', array(                 
        ));
    }
    
}
