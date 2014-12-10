<?php

namespace JP\OptionsResolverBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $file = 'image.png';
        $options = array(
            'name'    => 'image2',
            'quality' => 60,
            'output'  => 'jpg',
        );

        $imageConverter = $this->get('image_converter');
        $imageConverter->initialize($file, $options);

        return $this->render('JPOptionsResolverBundle:Home:index.html.twig', array(
            'options' => $imageConverter->getOptions()
        ));
    }
}
