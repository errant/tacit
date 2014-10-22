<?php 
namespace Tacit\Instruction\Branch;
/**
 * Jump if Less Than or Equal to
 *
 * @author Tom Morton
 */
class Jle extends \Tacit\Instruction\Branch\Jmp {

	public $command = 'JLE';

	public function execute($vm)
	{
		$left = $vm->stack->pop();
		$right = $vm->stack->pop();
		$vm->pointer++;
		if($left <= $right) {
			$vm->pointer = $vm->getByte();
		}
	}

}

