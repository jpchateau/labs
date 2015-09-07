<?php

namespace JP\DiceBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use JP\DiceBundle\Dice\Dice;

/**
 * Class FilterDiceEvent
 */
class FilterDiceEvent extends Event
{
    /** @var Dice */
    protected $die;

    /**
     * @param Dice $die
     */
    public function __construct(Dice $die)
    {
        $this->die = $die;
    }

    /**
     * @return Dice
     */
    public function getDie()
    {
        return $this->die;
    }
}