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

    public function test1Action()
    {
        return $this->render('JPInstagramBundle:Home:test1.html.twig');
    }

    public function test2Action()
    {
        $form = '<div class="hey"><form name="test" method="post" action="' . $this->generateUrl('test1') . '"><input type="text" value="hey" /></form></div>';
        $response = new Response();
        $response->setContent($this->renderView('JPInstagramBundle:Home:test2.json.twig', array('form' => $form)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
