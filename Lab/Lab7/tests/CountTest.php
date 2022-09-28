<?php

class CountTest extends \PHPUnit\Framework\TestCase{
    public function testAll(){
        $this->assertCount(4,array(1,2,3),"Array doesn't contain 4 elements");
    }
}