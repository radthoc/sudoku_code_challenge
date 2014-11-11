<?php
namespace Kata\Tests;

use Kata\sudoku;

class sudokuTest extends \PHPUnit_Framework_TestCase
{

    private $sudoku;

    protected function setUp()
    {
        $this->arrayWithDuplicates = array(
            1,
            4,
            3,
            1,
            5,
            3,
            3,
            7,
            3
        );

        $this->arrayWithoutDuplicates = array(
            1,
            4,
            3,
            5,
            7,
            2
        );

        $this->boxesmatrixWithoutDuplicates = array(
            1 => array(1,8,2),
            2 => array(9,6,5),
            3 => array(7,4,3),
            4 => array(3,7,4),
            5 => array(6,2,8),
            6 => array(5,1,9),
            7 => array(2,9,7),
            8 => array(4,3,1),
            9 => array(8,5,6),
        );

        $this->sudokuMatrix = array(
            1 => array(1,8,2,5,4,3,6,9,7),
            2 => array(9,6,5,1,7,8,3,4,2),
            3 => array(7,4,3,9,6,2,8,1,5),
            4 => array(3,7,4,8,9,6,5,2,1),
            5 => array(6,2,8,4,5,1,7,3,9),
            6 => array(5,1,9,2,3,7,4,6,8),
            7 => array(2,9,7,6,8,4,1,5,3),
            8 => array(4,3,1,7,2,5,9,8,6),
            9 => array(8,5,6,3,1,9,2,7,4),
        );

        $this->sudoku = new sudoku();
    }

    public function testDuplicatesInArray()
    {
        $this->assertFalse($this->sudoku->isVectorWithoutDuplicates($this->arrayWithDuplicates));
    }

    public function testArrayWithoutDuplicates()
    {
        $this->assertTrue($this->sudoku->isVectorWithoutDuplicates($this->arrayWithoutDuplicates));
    }

    public function testColumnsWithoutDuplicates()
    {
        $this->assertTrue($this->sudoku->areColumnsWithoutDuplicates($this->boxesmatrixWithoutDuplicates));
    }

    public function testRowsWithoutDuplicates()
    {
        $this->assertTrue($this->sudoku->areRowsWithoutDuplicates($this->sudokuMatrix));
    }

    public function testIsSudoku()
    {
        $this->assertTrue($this->sudoku->isSudoku($this->sudokuMatrix));
    }
}
