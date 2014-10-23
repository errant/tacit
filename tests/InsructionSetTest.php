<?php
class InstructionSetTest extends PHPUnit_Framework_TestCase
{


    public function setUp()
    {
        $this->instructionSet = new \Tacit\InstructionSet;        
    }

    public function protectedAddresses()
    {
        return array(
            array(0),
            array(1),
            array(2),
            array(3),
            array(4),
            array(5),
            array(6),
            array(7),
            array(8),
            array(9),
        );
    }

    public function testAddGetInstruction()
    {
        $instruction = new \Tacit\Instruction;
        $this->instructionSet->addInstruction(0x0A, $instruction);
        $this->assertInstanceOf('\\Tacit\\Instruction',$this->instructionSet->getInstruction(0x0A));
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Unable overload reserved bytecode
     * @dataProvider protectedAddresses
     */
    public function testAddProtectedAddress($address)
    {
        $instruction = new \Tacit\Instruction;
        $this->instructionSet->addInstruction($address, $instruction);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Instruction Set Error: Unknown byte code
     */
    public function testGetUnknown()
    {
        $this->instructionSet->getInstruction(0x0A);    
    }



    public function testAddInstructions()
    {
        $instruction = new \Tacit\Instruction;
        $this->instructionSet->addInstructions(array(0x0A => $instruction, 0x0B => $instruction));
        $this->assertInstanceOf('\\Tacit\\Instruction',$this->instructionSet->getInstruction(0x0A));
        $this->assertInstanceOf('\\Tacit\\Instruction',$this->instructionSet->getInstruction(0x0B));
    }

}