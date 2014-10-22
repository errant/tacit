<?php 
namespace Tacit\Instruction\Command;
/**
 * Sleep for X seconds
 *
 * @author Tom Morton
 */
class Slp extends \Tacit\Instruction {

	public $command = 'SLP';

	public function execute($vm)
	{
		$vm->pointer++;
		sleep($vm->getByte());
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