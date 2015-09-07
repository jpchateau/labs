<?php

namespace JP\DiceBundle\Dice;

/**
 * Class Dice.
 */
class Dice
{
    /** var int */
    const LUCK = 51;

    /** @var int */
    private $faces;

    /** @var int */
    private $result;

    /** @var int */
    private $load;

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param int $result
     * @return self
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return int
     */
    public function getFaces()
    {
        return $this->faces;
    }

    /**
     * @param int $faces
     * @return self
     */
    public function setFaces($faces)
    {
        $this->faces = $faces;

        return $this;
    }

    /**
     * @return int
     */
    public function getLoad()
    {
        return $this->load;
    }

    /**
     * @param int $load
     * @return self
     */
    public function setLoad($load)
    {
        $this->load = $load;

        return $this;
    }

    public function roll()
    {
        $this->result = rand(1, $this->faces);

        return $this;
    }

    public function cheat()
    {
        $random = rand(1, 100);
        if ($random > self::LUCK) {
            return;
        }

        $this->result = $this->load;
    }
}
