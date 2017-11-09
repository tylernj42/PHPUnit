<?php

namespace App\Calculator;

class Division extends OperationAbstract implements OperationInterface{
    public function calculate(){
        if(count($this->operands) === 0){
            throw new Exceptions\NoOperandsException;
        }

        return array_reduce(array_filter($this->operands), function($a, $b){
            if($a !== null && $b !== null){
                return $a / $b;
            }
            return $b;
        });
    }
}