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
	protected $memoryMax = array();
	protected $running;
	public $bytecode = array();

	public function __construct(\Tacit\InstructionSet $instructionSet, $memoryMax=2048, $stackSize = 1024)
	{
		$this->memory = new \Tacit\Memory\Store($memoryMax);
		$this->stack = new \Tacit\Stack($this->memory, $stackSize);
		$this->execution = new \Tacit\Stack($this->memory, 10);
		$this->instructionSet = $instructionSet;
	}

	/**
	 * Terminate the VM
	 */
	public function terminate()
	{
		$this->running = false;
	} 

	/**
	 * Boot VM
	 */
	public function boot()
	{
		# Bootloader
		$bootloader = $this->memory->get(0x00);
		$this->bytecode = $bootloader->getData();

		$this->run();
	}

	public function run()
	{

		$this->running = true;
		$this->pointer = 0;

		while($this->pointer < count($this->bytecode)) {
			if(!$this->running) {
				break;
			}
			$byte = $this->bytecode[$this->pointer];
			$instruction = $this->instructionSet->getInstruction($byte);
			$instruction->execute($this);
			$this->pointer++;
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