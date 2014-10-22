<?php 
namespace Tacit\Instruction\Branch;
/**
 * Jump if Less Than
 *
 * @author Tom Morton
 */
class Jmp extends \Tacit\Instruction {

	public $command = 'JMP';

	public function execute($vm)
	{
		$vm->pointer++;
		$vm->pointer = $vm->getByte();
	}

	public function compile(&$bytestream, $byte, $command)
	{
		if(!isset($command['T_OPERAND'])) {
			throw new \Exception('Type ' . $this->command . ' expects an operand');
		}

		if($command['T_OPERAND'] > 255) {
			throw new \Exception('Type ' . $this->command . ' overflow (0-255)');
		}

		$bytestream[] = $byte;

		$uuid = uniqid();
		$bytestream[] = $uuid;

		return array((int) $command['T_OPERAND'], $uuid);

	}
}

