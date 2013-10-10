<?php

namespace JP\EmberJSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GTAController extends Controller
{
    public function indexAction()
    {
        return $this->render('JPEmberJSBundle:GTA:index.html.twig');
    }
}
