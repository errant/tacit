<?php 
namespace Tacit\Instruction\Type;
/**
 * Integer Type
 *
 * @author Tom Morton
 */
class Int extends \Tacit\Instruction {

	public $command = 'INT';

	public function execute($vm)
	{
		$vm->pointer++;
		$vm->stack->push($vm->getByte());
	}

	public function compile(&$bytestream, $byte, $command)
	{
		if(!isset($command['T_OPERAND'])) {
			throw new \Exception('Type INT expects an operand');
		}

		if(!is_numeric($command['T_OPERAND'])) {
			throw new \Exception('Type INT expects an integer as operand');
		}

		if((int) $command['T_OPERAND'] > 255) {
			throw new \Exception('Type INT overflow (0-255)');
		}

		$bytestream[] = $byte;

		$bytestream[] = (int) $command['T_OPERAND'];

	}
}