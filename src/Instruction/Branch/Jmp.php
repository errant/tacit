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

	public function compile(&$bytestream, $byte, $command, &$targets, $i)
	{
		if(!isset($command['T_OPERAND'])) {
			throw new \Exception('Type ' . $this->command . ' expects an operand');
		}

		if($command['T_OPERAND'] > 255) {
			throw new \Exception('Type ' . $this->command . ' overflow (0-255)');
		}

		$bytestream[] = $byte;

		$target = $i + (int) $command['T_OPERAND'];
		$uuid = uniqid();

		$targets[$uuid] = $target;
		$bytestream[] = $uuid;

	}
}

