<?php

namespace JP\DiceBundle\Manager;

use JP\DiceBundle\Dice\Dice;
use JP\DiceBundle\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class DiceManager
 */
class DiceManager
{
    /** @var Dice */
    private $die;

    /** @var EventDispatcher */
    private $dispatcher;

    /**
     * @param Dice $die
     */
    public function __construct(Dice $die)
    {
        $this->die = $die;
        $this->dispatcher = new EventDispatcher();
        $this->dispatcher->addSubscriber(new Event\DiceSubscriber());
    }

    /**
     * @return $this
     */
    public function roll()
    {
        $event = new Event\FilterDiceEvent($this->die);

        $this->dispatcher->dispatch(Event\DiceEvents::PRE_ROLL, $event);

        $this->die->roll();

        $this->dispatcher->dispatch(Event\DiceEvents::POST_ROLL, $event);

        return $this;
    }

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->die->getResult();
    }
}
