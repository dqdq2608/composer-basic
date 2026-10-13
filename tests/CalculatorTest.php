<?php

namespace Test;

use App\Calculator;

class CalculatorTest extends BaseTestCase{
    public function test_sum_successfully(): void{
        $x = 5;
        $y = 2;
        $calculator = new Calculator();
        $this->assertSame(7, $calculator->plus($x, $y));
    }
}
