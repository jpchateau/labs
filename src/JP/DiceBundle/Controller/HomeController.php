<?php

namespace JP\DiceBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $d6 = $this->get('dice_d6');
        $d10 = $this->get('dice_d10');
        $cheat = $this->get('dice_cheat');

        $results = [
            'd6'    => $d6->roll()->getResult(),
            '2d6'   => $d6->roll(2)->getResult(),
            'd10'   => $d10->roll()->getResult(),
            'cheat' => $cheat->roll()->getResult(),
        ];

        return [
            'results' => $results,
        ];
    }
}
