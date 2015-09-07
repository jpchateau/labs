<?php

namespace JP\DiceBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use JP\DiceBundle\Dice\Dice;

/**
 * Class FilterDiceEvent.
 */
class FilterDiceEvent extends Event
{
    /** @var Dice */
    protected $dice;

    /**
     * @param Dice $die
     */
    public function __construct(Dice $dice)
    {
        $this->dice = $dice;
    }

    /**
     * @return Dice
     */
    public function getDice()
    {
        return $this->dice;
    }
}