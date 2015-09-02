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
        $d6->roll();

        return array(
            'result' => $d6->getResult()
        );
    }
}
