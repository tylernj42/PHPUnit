<?php

class AdditionTest extends \PHPUnit\Framework\TestCase {
    public function test_if_adds_given_operands(){
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 15]);

        $this->assertEquals(20, $addition->calculate());
    }

    public function test_if_exception_is_thrown_when_no_operands_are_given(){
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new \App\Calculator\Addition;
        $addition->calculate();
    }
}