<?php
namespace Tacit;
/**
 * Instruction Set
 *
 * @author Tom Morton
 */
class InstructionSet {

	protected $instructions = array();

	public function addInstruction($byteCode, \Tacit\Instruction $instruction)
	{
		if($byteCode < 10) {
			throw new \Exception('Unable overload reserved bytecode: ' . $byteCode);
		}

		$this->instructions[$byteCode] = $instruction;
	}

	public function getInstruction($byteCode)
	{
		if(!isset($this->instructions[$byteCode])) {
			throw new \Exception('Instruction Set Error: Unknown byte code: ' . $byteCode);
		}

		return $this->instructions[$byteCode];
	}

	public function addInstructions(array $instructions)
	{
		foreach($instructions as $bytecode => $instruction) {
			$this->addInstruction($bytecode, $instruction);
		}
	}

	public function getGrammar()
	{
		$grammar = array();
		foreach($this->instructions as $byte => $instruction) {
			$grammar[$instruction->command] = array($byte, $instruction);
		}
		return $grammar;
	}
}