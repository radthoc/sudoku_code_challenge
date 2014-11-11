<?php
namespace Kata;

/**
 * Class sudoku
 * @package Kata
 */

class sudoku
{
    private $lastColumn = 0;

    public function isSudoku($solution)
    {
        $isOK = $this->areRowsWithoutDuplicates($solution);

        if ($isOK)
        {
            $isOK = $this->areColumnsWithoutDuplicates($solution);
        }

        if ($isOK) {
            $isOK = $this->areBoxesWithoutDuplicates($solution);
        }

        return $isOK;

    }

    public function areRowsWithoutDuplicates($matrix)
    {
        foreach ($matrix as $row) {
            if (!$this->isVectorWithoutDuplicates($row))
            {
                return false;
            }
        }
        return true;
    }

    public function areColumnsWithoutDuplicates($matrix, $column = 0)
    {
        $vector = array();
        for ($row = 1; $row <= count($matrix); $row++)
        {
            $vector[] = $matrix[$row][$column];
        }

        if (!$this->isVectorWithoutDuplicates($vector))
        {
            return false;
        }

        if ($column < count($matrix[1]) - 1)
        {
            $this->areColumnsWithoutDuplicates($matrix, ++$column);
        }
        return true;
    }

    public function areBoxesWithoutDuplicates($boxes)
    {
        for ($row = 1; $row <= 9; $row++)
        {
            for ($column = $this->lastColumn; $column < 9; $column++)
            {
                $boxVector[] = $boxes[$row][$column];

                if (($column + 1) % 3 == 0)
                {
                    if ($row % 3 == 0)
                    {
                        if (!$this->isVectorWithoutDuplicates($boxVector))
                        {
                            return false;
                        }

                        $boxVector = array();
                        $this->lastColumn = $column + 1;

                        if ($column < 6)
                        {
                            $row -= 2;
                        }
                        else
                        {
                            $this->lastColumn = 0;
                        }
                    }
                    else
                    {
                        break;
                    }
                }
            }
        }
        return true;
    }

    public function isVectorWithoutDuplicates($array)
    {
        $counts = array_count_values($array);

        foreach ($counts as $value => $count)
        {
            if ($count > 1)
            {
                return false;
            }
        }
        return true;
    }
}
