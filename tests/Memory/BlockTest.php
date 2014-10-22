<?php
class BlockTest extends PHPUnit_Framework_TestCase
{

    protected $testData = array(0x00, 0xAB, 0xCD);

    public function testConstruct()
    {
        $block = new \Tacit\Memory\Block(0xEF, $this->testData);
    }
    public function testGetAddess()
    {
        $block = new \Tacit\Memory\Block(0xEF, $this->testData);
        $this->assertEquals(0xEF, $block->getAddress());
    }

    public function testGetSize()
    {
        $block = new \Tacit\Memory\Block(0xEF, $this->testData);
        $this->assertEquals(3, $block->getSize());
    }


    public function testGetData()
    {
        $block = new \Tacit\Memory\Block(0xEF, $this->testData);
        $this->assertEquals($this->testData, $block->getData());
    }

    public function testProtection()
    {
        $block = new \Tacit\Memory\Block(0xEF, $this->testData);
        $this->assertFalse($block->isProtected());
        $block->protect();
        $this->assertTrue($block->isProtected());
        $block->unprotect();
        $this->assertFalse($block->isProtected());
    }


}