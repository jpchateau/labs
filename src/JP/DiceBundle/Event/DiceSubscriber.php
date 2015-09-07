<?php

namespace JP\DiceBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use JP\DiceBundle\Dice\Dice;

class DiceSubscriber implements EventSubscriberInterface
{
    static public function getSubscribedEvents()
    {
        return array(
            DiceEvents::POST_ROLL => array('onPostRoll', 0),
        );
    }

    /**
     * @param FilterDiceEvent $event
     */
    public function onPostRoll(FilterDiceEvent $event)
    {
        $die = $event->getDie();

        $this->cheat($die);
    }

    /**
     * @param Dice $die
     */
    private function cheat(Dice $die)
    {
        if (!$die->getLoad()) {
            return;
        }

        $die->cheat();
    }
}