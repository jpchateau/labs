<?php

namespace JP\EmberJSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JP\EmberJSBundle\Extension\JsonResponse;

class GTAController extends Controller
{
    public function indexAction()
    {
        return $this->render('JPEmberJSBundle:GTA:index.html.twig');
    }

    public function gamesAction()
    {
        $games = array(array('slug'  => 'gta3',
                             'name'  => 'Grand Theft Auto III',
                             'image' => 'gta3_logo_04.jpg'),
                       array('slug'  => 'gta4',
                             'name'  => 'Grand Theft Auto IV',
                             'image' => 'gta4-logo.jpg'),
        );

        return new JsonResponse(json_encode($games));
    }

    public function gameAction($slug)
    {
        $radios = array();
        switch ($slug) {
            case 'gta3':
                array_push($radios, array('slug' => 'flashback-fm', 'image' => '250px-Flashback_95.6_(logo).svg.png', 'name' => 'Flashback FM', 'category' => '', 'duration' => '18.25'));
                array_push($radios, array('slug' => 'lips106', 'image' => '180px-Lips_106.jpg', 'name' => 'Lips 106', 'category' => '', 'duration' => ''));
                break;
            case 'gta4':

                break;
        }

        return new JsonResponse(json_encode($radios));
    }


}
