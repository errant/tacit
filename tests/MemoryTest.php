<?php
class MemoryTest extends PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $memory = new \Tacit\MemoryStore(256);
    }

    public function testGetLimit()
    {
        $memory = new \Tacit\MemoryStore(256);
        $this->assertEquals(256, $memory->getLimit());
    }

    public function testGetSize()
    {
        $memory = new \Tacit\MemoryStore(256);
        $this->assertEquals(0, $memory->getSize());
    }

    /**
     * @depends testGetSize
     */
    public function testReserveBytes()
    {
        $memory = new \Tacit\MemoryStore(256);
        $memory->reserveBytes(10);
        $this->assertEquals(10, $memory->getSize());
    }

    /**
     * @depends testReserveBytes
     */
    public function testGetFree()
    {
        $memory = new \Tacit\MemoryStore(256);
        $this->assertEquals(256, $memory->free());
    }
}