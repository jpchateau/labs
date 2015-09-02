<?php

namespace JP\DiceBundle\Dice;

class DiceSix
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
        $this->result = round(rand(0, 6), 0);
    }
}
