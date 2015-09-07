<?php

namespace JP\DiceBundle\Dice;

/**
 * Class Dice
 */
class Dice
{
    const LUCK = 75;

    private $faces;
    private $result;
    private $load;

    /**
     * @return integer
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param integer $result
     * @return self
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFaces()
    {
        return $this->faces;
    }

    /**
     * @param integer $faces
     * @return self
     */
    public function setFaces($faces)
    {
        $this->faces = $faces;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLoad()
    {
        return $this->load;
    }

    /**
     * @param integer $load
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
