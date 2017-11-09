<?php

class DivisionTest extends \PHPUnit\Framework\TestCase {
    public function test_if_divides_given_operands(){
        $division = new \App\Calculator\Division;
        $division->setOperands([100, 2]);

        $this->assertEquals(50, $division->calculate());
    }

    public function test_if_exception_is_thrown_when_no_operands_are_given(){
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new \App\Calculator\Addition;
        $addition->calculate();
    }

    public function test_if_removes_division_by_zero_operands(){
        $division = new \App\Calculator\Division;
        $division->setOperands([10, 0, 0, 5, 0]);

        $this->assertEquals(2, $division->calculate());
    }
}