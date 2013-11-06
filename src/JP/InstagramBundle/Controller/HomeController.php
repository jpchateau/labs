<?php

namespace JP\InstagramBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function indexAction()
    {
        return $this->render('JPInstagramBundle:Home:index.html.twig');
    }

}
