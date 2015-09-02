<?php

namespace JP\DiceBundle\Dice;

class DiceSix implements DiceInterface
{
    private $result;

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }

    public function roll()
    {
        $this->result = round(rand(1, 6), 0);

        return $this;
    }
}
