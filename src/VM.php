<?php
namespace Tacit;
/**
 * Tacit VM
 *
 * Top level Virtual Machine
 *
 * $vm = new \Tacit\VM;
 * $vm->interpret(<bytecode>);
 *
 * @author Tom Morton
 */
class VM {

	protected $instructions = array();
	protected $bytecode = array();
	protected $memoryMax = array();

	public function __construct(\Tacit\InstructionSet $instructionSet, $memoryMax=256, $stackSize = 128)
	{
		$this->memory = new \Tacit\Memory\Store($memoryMax);
		$this->stack = new \Tacit\Stack($this->memory, $stackSize);
		$this->instructionSet = $instructionSet;
	}

	/**
	 * Execute some ByteCode
	 *
	 * @param array $bytecode Array of Bytes
	 */
	public function interpret($bytecode, $debug=false)
	{
		$this->memory->reserveBytes(count($bytecode));

		$this->bytecode = $bytecode;

		for($this->pointer=0; $this->pointer < count($this->bytecode); $this->pointer++) {
			$byte = $this->bytecode[$this->pointer];
			$instruction = $this->instructionSet->getInstruction($byte);
			$instruction->execute($this);
			if($debug) {
				echo $instruction->command . "\n";
				echo "NXT: {$this->pointer}\n";
				sleep(1);
			}
		}
	}

	public function getByte($pointer=null)
	{
		if($pointer === null) {
			$pointer = $this->pointer;
		}

		if($pointer >= count($this->bytecode)) {
			throw new \Exception('Pointer Overflow');
		}

		return $this->bytecode[$pointer];
	}

}