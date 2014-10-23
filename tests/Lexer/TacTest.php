<?php
class LexerTacTest extends PHPUnit_Framework_TestCase
{


    public function testConstruct()
    {
        $tokens = \Tacit\Lexer\Tac::run("CMD operand\nCMD");

        $this->assertInternalType('array',$tokens);
        $this->assertCount(2,$tokens);
        $this->assertEquals(array('T_CMD' => 'CMD', 'T_OPERAND' => 'operand'),$tokens[0]);
        $this->assertEquals(array('T_CMD' => 'CMD'),$tokens[1]);

    }


}