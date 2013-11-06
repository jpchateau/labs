<?php

namespace JP\InstagramBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{

    public function indexAction()
    {

        return $this->render('JPInstagramBundle:Tag:index.html.twig');
    }
}
