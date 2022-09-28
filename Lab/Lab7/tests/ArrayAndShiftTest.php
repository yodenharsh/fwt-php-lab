<?php

class ArrayAndShiftTest extends \PHPUnit\Framework\TestCase{
    public function testAll(){
        $this->assertIsArray(array('hi' => "Hi"));
        $this->assertIsString("Hello");
    }
}