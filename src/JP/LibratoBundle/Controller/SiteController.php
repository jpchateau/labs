<?php

namespace JP\LibratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function homeAction()
    {
        $curl = $this->get('curl');
        $curl->postMetric('homepage', 1, 'site_homepage');
        return $this->render('JPLibratoBundle:Site:home.html.twig');
    }

    public function cartAction()
    {
        return $this->render('JPLibratoBundle:Site:cart.html.twig');
    }

    public function orderAction()
    {
        return $this->render('JPLibratoBundle:Site:order.html.twig');
    }

    public function postAction($name, $value)
    {
        $curl = $this->get('curl');
        $curl->postMetric($name, $value);
        return $this->render('JPLibratoBundle:Site:post.html.twig', array('type' => 'curl', 'name' => $name, 'value' => $value));
    }

    public function statsdAction($name, $value)
    {
        $curl = $this->get('statsd');
        $curl->postMetric($name, $value);
        return $this->render('JPLibratoBundle:Site:post.html.twig', array('type' => 'statsd', 'name' => $name, 'value' => $value));
    }
}
