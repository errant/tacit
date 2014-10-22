<?php 
namespace Tacit\Instruction\Branch;
/**
 * Jump if Less Than
 *
 * @author Tom Morton
 */
class Jlt extends \Tacit\Instruction\Branch\Jmp {

	public $command = 'JLT';

	public function execute($vm)
	{
		$left = $vm->stack->pop();
		$right = $vm->stack->pop();
		$vm->pointer++;
		if($left < $right) {
			$vm->pointer = $vm->getByte();
		}
	}

}

