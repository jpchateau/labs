<?php

namespace JP\LibratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function homeAction()
    {
        return $this->render('JPLibratoBundle:Site:home.html.twig', array());
    }

    public function cartAction()
    {
        return $this->render('JPLibratoBundle:Site:cart.html.twig', array());
    }

    public function orderAction()
    {
        return $this->render('JPLibratoBundle:Site:order.html.twig', array());
    }
}
