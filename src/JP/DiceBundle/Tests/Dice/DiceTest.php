<?php

namespace JP\DiceBundle\Tests\Dice;

use JP\DiceBundle\Dice\Dice;

class DiceTest extends \PHPUnit_Framework_TestCase
{
    public function dataProviderTestRoll()
    {
        return [
            [
                [
                    'faces' => 3,
                ],
                [1, 2, 3]
            ],
            [
                [
                    'faces' => 6,
                ],
                [1, 2, 3, 4, 5, 6]
            ],
            [
                [
                    'faces' => 10,
                ],
                [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestRoll
     */
    public function testRoll($data, $expectedResults)
    {
        $die = new Dice();
        $die->setFaces($data['faces']);

        for ($i = 1; $i <= 50; $i++) {
            $die->roll();
            $this->assertTrue(in_array($die->getResult(), $expectedResults));
        }
    }
}
