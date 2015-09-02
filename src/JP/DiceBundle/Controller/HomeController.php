<?php

namespace JP\DiceBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $d6 = $this->get('dice_d6');
        $d3 = $this->get('dice_d3');

        $results = array(
            'd6' => $d6->roll()->getResult(),
            'd3' => $d3->roll()->getResult(),
        );

        return array(
            'results' => $results,
        );
    }
}
