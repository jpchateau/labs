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
        $d6 = $this->get('die_d6');
        $d10 = $this->get('die_d10');
        $cheat = $this->get('die_cheat');

        $results = array(
            'd6' => $d6->roll()->getResult(),
            'd10' => $d10->roll()->getResult(),
            'cheat' => $cheat->roll()->getResult(),
        );

        return array(
            'results' => $results,
        );
    }
}
