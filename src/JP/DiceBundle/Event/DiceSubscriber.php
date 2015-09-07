<?php

namespace JP\DiceBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use JP\DiceBundle\Dice\Dice;

/**
 * Class DiceSubscriber.
 */
class DiceSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    static public function getSubscribedEvents()
    {
        return array(
            DiceEvents::PRE_ROLL => array('onPreRoll', 0),
            DiceEvents::POST_ROLL => array('onPostRoll', 0),
        );
    }

    /**
     * @param FilterDiceEvent $event
     */
    public function onPreRoll(FilterDiceEvent $event)
    {
        return;
    }

    /**
     * @param FilterDiceEvent $event
     */
    public function onPostRoll(FilterDiceEvent $event)
    {
        $dice = $event->getDice();

        $this->enterCheatMode($dice);
    }

    /**
     * @param Dice $dice
     */
    private function enterCheatMode(Dice $dice)
    {
        if (!$dice->getLoad()) {
            return;
        }

        $dice->cheat();
    }
}
