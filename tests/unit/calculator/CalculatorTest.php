<?php

class CalculatorTest extends \PHPUnit\Framework\TestCase {
    public function test_if_can_set_single_operation(){
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertcount(1, $calculator->getOperations());
    }

    public function test_if_can_set_multiple_operations(){
        $addition1 = new \App\Calculator\Addition;
        $addition1->setOperands([5, 10]);

        $addition2 = new \App\Calculator\Addition;
        $addition2->setOperands([15, 1]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertcount(2, $calculator->getOperations());
    }

    public function test_if_operations_are_ignored_if_not_operation_interface_instance(){
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([15, 1]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition, 'cats']);

        $this->assertcount(1, $calculator->getOperations());
    }

    public function test_if_can_calculate_result(){
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([15, 5]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertEquals(20, $calculator->calculate());
    }

    public function test_if_method_returns_multiple_results(){
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([15, 5]);

        $division = new \App\Calculator\Division;
        $division->setOperands([15, 5]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition, $division]);

        $this->assertInternalType('array', $calculator->calculate());
        $this->assertEquals(20, $calculator->calculate()[0]);
        $this->assertEquals(3, $calculator->calculate()[1]);
    }
}