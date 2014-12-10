<?php

namespace JP\OptionsResolverBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function indexAction()
    {
        $imageConverter = $this->get('image_converter');
        $file = 'image.png';

        $options = array(
            'name' => 'test',
            'quality' => 20,
            'output' => 'jpg',
        );

        $imageConverter->initialize($file, $options);
        $imageConverter->encode();

        return $this->render('JPOptionsResolverBundle:Home:index.html.twig', array('options' => $imageConverter->getOptions()));
    }
}
