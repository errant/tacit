<?php
class MemoryTest extends PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $memory = new \Tacit\Memory\Store(256);
    }

    public function testGetLimit()
    {
        $memory = new \Tacit\Memory\Store(256);
        $this->assertEquals(256, $memory->getLimit());
    }

    public function testGetSize()
    {
        $memory = new \Tacit\Memory\Store(256);
        $this->assertEquals(0, $memory->getSize());
    }

    /**
     * @depends testGetSize
     */
    public function testReserveBytes()
    {
        $memory = new \Tacit\Memory\Store(256);
        $memory->reserveBytes(10);
        $this->assertEquals(10, $memory->getSize());
    }

    /**
     * @depends testReserveBytes
     */
    public function testReleaseBytes()
    {
        $memory = new \Tacit\Memory\Store(256);
        $memory->reserveBytes(10);
        $this->assertEquals(10, $memory->getSize());
        $memory->releaseBytes(5);
        $this->assertEquals(5, $memory->getSize());
        $memory->releaseBytes(10);
        $this->assertEquals(0, $memory->getSize());
    }

    /**
     * @depends testReserveBytes
     */
    public function testGetFree()
    {
        $memory = new \Tacit\Memory\Store(256);
        $this->assertEquals(256, $memory->free());
    }

    /**
     * @depends testReserveBytes
     * @expectedException Exception
     * @expectedExceptionMessage Out of Memory Error
     */
    public function testOutOfMemory()
    {
        $memory = new \Tacit\Memory\Store(5);
        $memory->reserveBytes(10);
    }
}