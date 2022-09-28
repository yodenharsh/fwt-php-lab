<?php
namespace App;

class ShiftAndLogicalOps {
    public function leftShift($num,$shiftBy){
        return $num << $shiftBy;
    }

    public function bothTrue($num1,$num2){
        if($num1==true and $num2==true){
            return true;
        }
        return false;
    }
}