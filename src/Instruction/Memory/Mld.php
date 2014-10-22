<?php 
namespace Tacit\Instruction\Memory;
/**
 * Load from X memory location into the stack
 *
 * @author Tom Morton
 */
class Mld extends \Tacit\Instruction {

	public $command = 'MLD';

	public function execute($vm)
	{
		$vm->pointer++;
		$block = $vm->memory->get(base_convert($vm->getByte(),16,10));
		foreach($block->getData() as $byte) {
			$vm->stack->push($byte);
		}
	}

	public function compile(&$bytestream, $byte, $command)
	{
		if(!isset($command['T_OPERAND'])) {
			throw new \Exception('Command ' . $this->command . ' expects an operand');
		}

		$bytestream[] = $byte;
		$bytestream[] = $command['T_OPERAND'];

	}
}