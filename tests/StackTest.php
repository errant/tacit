<?php
class StackTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->memory = new \Tacit\Memory\Store(256);
    }

    public function invalidDataProvider()
    {
        return array(
            array('string'),
            array(true),
            array(null),
            array(array())
        );
    }

    public function testConstruct()
    {
        $stack = new \Tacit\Stack($this->memory, 128);
    }

    /**
     * @dataProvider invalidDataProvider
     * @expectedException Exception
     * @expectedExceptionMessage Stack size must be specified as an integer
     */
    public function testConstructFail($size)
    {
        $stack = new \Tacit\Stack($this->memory, $size);
    }
   

    public function testPushPop()
    {
        $stack = new \Tacit\Stack($this->memory, 128);
        $stack->push(123);
        $this->assertEquals(123, $stack->pop());
        $stack->push(123);
        $stack->push(456);
        $this->assertEquals(456, $stack->pop());
    }

}