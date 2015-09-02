<?php

namespace JP\DiceBundle\Dice;

class DiceThree implements DiceInterface
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
        $this->result = round(rand(1, 3), 0);

        return $this;
    }
}
