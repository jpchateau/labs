<?php

namespace JP\EmberJSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JP\EmberJSBundle\Extension\JsonResponse;
//use Symfony\Component\HttpFoundation\Response;

class GTAController extends Controller
{
    public function indexAction()
    {
        return $this->render('JPEmberJSBundle:GTA:index.html.php');
    }

    public function gamesAction()
    {
        $games = array(array('slug'  => 'gta3',
                             'name'  => 'Grand Theft Auto III',
                             'image' => 'gta3_logo_04.jpg'),
                       array('slug'  => 'gtavc',
                             'name'  => 'Grand Theft Auto - Vice City',
                             'image' => 'GTA_Vice_City_Logo_Transparent.png'),
                       array('slug'  => 'gtasa',
                             'name'  => 'Grand Theft Auto - San Andreas',
                             'image' => 'GTA_SA_Logo_Transparent.png'),
                       array('slug'  => 'gta4',
                             'name'  => 'Grand Theft Auto IV',
                             'image' => 'gta4-logo.jpg'),
                       array('slug'  => 'gta4',
                             'name'  => 'Grand Theft Auto V',
                             'image' => 'GTA_V_Logo.svg.png'),
        );

        return new JsonResponse(json_encode($games));
    }

    public function gameAction($slug)
    {
        $radios = array();
        switch ($slug) {
            case 'gta3':
                array_push($radios, array('slug' => 'flashback-fm', 'image' => '250px-Flashback_95.6_(logo).svg.png', 'name' => 'Flashback FM', 'category' => '80\'s', 'duration' => '18.25', 'track' => 'flashback-fm.mp3'));
                array_push($radios, array('slug' => 'lips106', 'image' => '180px-Lips_106.jpg', 'name' => 'Lips 106', 'category' => 'Pop', 'duration' => '20.07', 'track' => 'lips106.mp3'));
                array_push($radios, array('slug' => 'kjah', 'image' => 'KJah.png', 'name' => 'K-Jah', 'category' => 'Reggae', 'duration' => '19.04', 'track' => 'k-jah.mp3'));
                break;
        }

        return new JsonResponse(json_encode($radios));
    }


}
