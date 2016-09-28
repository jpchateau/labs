<?php

namespace JP\AwsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JPAwsBundle:Default:index.html.twig', array('name' => $name));
    }
}
