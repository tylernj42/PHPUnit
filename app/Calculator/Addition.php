<?php

namespace App\Calculator;

class Addition extends OperationAbstract implements OperationInterface{
    public function calculate(){
        if(count($this->operands) === 0){
            throw new Exceptions\NoOperandsException;
        }

        return array_sum($this->operands);
    }
}