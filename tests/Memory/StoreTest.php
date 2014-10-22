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
     * @expectedException Exception
     * @expectedExceptionMessage Out of Memory Error
     */
    public function testOutOfMemory()
    {
        $memory = new \Tacit\Memory\Store(5);
        $memory->reserveBytes(10);
    }

    public function testStore()
    {
        $memory = new \Tacit\Memory\Store(256);

        $block = $memory->store(0x00, array(0xAB, 0xAC));

        $this->assertInstanceOf('\\Tacit\\Memory\\Block', $block);
        $this->assertEquals(2, $block->getSize());
        $this->assertEquals(array(0xAB, 0xAC), $block->getData());
        $this->assertEquals(0x00,$block->getAddress());
    }

    public function testStoreGenerateAddress()
    {
        $memory = new \Tacit\Memory\Store(2);

        $memory->store(0x00, array(0xAB));

        $block = $memory->store(NULL, array(0xAB));

        $this->assertEquals(0x01,$block->getAddress());
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Unable to overwrite protected memory space
     */
    public function testStoreOverwriteProtected()
    {
        $memory = new \Tacit\Memory\Store(256);

        $block = $memory->store(0x00, array(0xAB, 0xAC));

        $block->protect();

        $memory->store(0x00, array(0xAB, 0xAD));
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Out of Memory Error
     */
    public function testStoreFull()
    {
        $memory = new \Tacit\Memory\Store(2);

        $memory->store(0x00, array(0xAB, 0xAC));
        $memory->store(0x01, array(0xAB, 0xAC));
    }

    public function testStoreOverwrite()
    {
        $memory = new \Tacit\Memory\Store(256);

        $memory->store(0x00, array(0xAB, 0xAC));
        $block = $memory->store(0x00, array(0xAB, 0xAD));


        $this->assertEquals(0x00,$block->getAddress());
        $this->assertEquals(array(0xAB, 0xAD), $block->getData());
    }
}