<?php

namespace JP\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('JPUserBundle:Home:index.html.twig');
    }
}
