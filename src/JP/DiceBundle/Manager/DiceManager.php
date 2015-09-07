<?php

namespace JP\DiceBundle\Manager;

use JP\DiceBundle\Dice\Dice;
use JP\DiceBundle\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class DiceManager.
 */
class DiceManager
{
    /** @var Dice */
    private $dice;

    /** @var EventDispatcher */
    private $dispatcher;

    /** @var int */
    private $result;

    /**
     * @param Dice $dice
     */
    public function __construct(Dice $dice)
    {
        $this->dice = $dice;
        $this->dispatcher = new EventDispatcher();
        $this->dispatcher->addSubscriber(new Event\DiceSubscriber());
    }

    /**
     * @param int $throws
     * @return self
     */
    public function roll($throws = 1)
    {
        $event = new Event\FilterDiceEvent($this->dice);
        $this->result = 0;

        for ($i = 1; $i <= $throws; $i++) {
            $this->dispatcher->dispatch(Event\DiceEvents::PRE_ROLL, $event);

            $this->dice->roll();

            $this->dispatcher->dispatch(Event\DiceEvents::POST_ROLL, $event);

            $this->result += $this->dice->getResult();
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }
}
