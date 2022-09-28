<?php

class ShiftAndLogicalOpsTest extends \PHPUnit\Framework\TestCase{
    public function testAll(){
        $tempApp = new App\ShiftAndLogicalOps;
        $shiftResult = $tempApp->leftShift(4,2);
        $logicalResult = $tempApp->bothTrue(true,false);

        $this->assertEquals($shiftResult,16);
        $this->assertEquals($logicalResult,false);
    }
}