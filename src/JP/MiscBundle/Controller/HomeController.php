<?php

namespace JP\MiscBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JP\MiscBundle\Entity\User;

class HomeController extends Controller
{
    public function indexAction()
    {
        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('iban', 'iban')
            ->add('submit', 'submit')
            ->getForm()
        ;

        return $this->render('JPMiscBundle:Home:index.html.twig', array(
                'form' => $form->createView(),
        ));
    }

}
