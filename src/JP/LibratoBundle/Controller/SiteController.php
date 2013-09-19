<?php

namespace JP\LibratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function homeAction()
    {
        $curl = $this->get('curl');
        $curl->postMetric('home', 1, 'website');
        return $this->render('JPLibratoBundle:Site:home.html.twig');
    }

    public function homedAction()
    {
        $statsd = $this->get('statsd');
        $statsd::increment('home');
        return $this->render('JPLibratoBundle:Site:home.html.twig');
    }

    public function cartAction()
    {
        $curl = $this->get('curl');
        $curl->postMetric('cart', 1, 'website');
        return $this->render('JPLibratoBundle:Site:cart.html.twig');
    }

    public function orderAction()
    {
        $curl = $this->get('curl');
        $curl->postMetric('order', 1, 'website');
        return $this->render('JPLibratoBundle:Site:order.html.twig');
    }

    public function postAction($name, $value)
    {
        $curl = $this->get('curl');
        $curl->postMetric($name, $value);
        return $this->render('JPLibratoBundle:Site:post.html.twig', array('type' => 'curl', 'name' => $name, 'value' => $value));
    }

    public function statsdAction($name)
    {
        $statsd = $this->get('statsd');
        $statsd::increment($name);
        return $this->render('JPLibratoBundle:Site:post.html.twig', array('type' => 'statsd', 'name' => $name, 'value' => 1));
    }

    public function annotationAction($title)
    {
        $curl = $this->get('curl');
        $curl->postAnnotation($title);
        return $this->render('JPLibratoBundle:Site:post.html.twig', array('type' => 'curl', 'name' => $title, 'value' => 'annotation'));
    }
}
