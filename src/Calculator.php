<?php

namespace App;

class Calculator{
    public function plus(int $x, int $y): int{
        return $x + $y;
    }

    public function minus(int $x, int $y): int{
        return $x - $y;
    }

    public function multiply(int $x, int $y): int{
        return $x * $y;
    }
    public function divide(int $x, int $y): int{
        if ($y == 0) return -1;
        return $x / $y;
    } 
}
