<?php

namespace JP\DiceBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JP\DiceBundle\Dice\Dice;

class HomeController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        /** @var Dice $d6 */
        $d6 = $this->get('jp.die.d6');
        $d10 = $this->get('jp.die.d10');

        $results = array(
            'd6' => $d6->roll()->getResult(),
            'd10' => $d10->roll()->getResult(),
            'cheat' => $d6->roll()->cheat()->getResult(),
        );

        return array(
            'results' => $results,
        );
    }
}
