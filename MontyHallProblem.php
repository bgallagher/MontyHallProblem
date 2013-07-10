<?php

class MontyHallProblem
{
    public $numberOfBoxes;

    public $boxes = array();

    public $winningBox;

    public $selectedBox;

    public function __construct($numberOfBoxes = 3)
    {
        $this->numberOfBoxes = $numberOfBoxes;

        for ($i = 1; $i <= $this->numberOfBoxes; $i++) {
            $this->boxes[$i] = false;
        }

        $this->winningBox = rand(1, $this->numberOfBoxes);

        $this->boxes[$this->winningBox] = true;
    }

    public function selectBox($guess = null)
    {
        if (is_null($guess)) {
            $guess = rand(1, $this->numberOfBoxes);
        }

        $this->selectedBox = $guess;
    }

    public function removeEmptyBoxesBarOne()
    {
        while (count($this->boxes) != 2) {
            $keys = array_keys($this->boxes);
            $boxIndex = $keys[array_rand($keys)];

            if ($this->boxes[$boxIndex] === false) {
                unset($this->boxes[$boxIndex]);
            }
        }
    }

    public function swapBoxSelection()
    {
        foreach ($this->boxes as $key => $value) {
            if ($key != $this->selectedBox) {
                $this->selectedBox = $key;
                break;
            }
        }
    }

    public function check()
    {
        if ($this->winningBox === $this->selectedBox) {
            return true;
        }
    }
}