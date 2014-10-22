<?php 
namespace Tacit\Instruction\Branch;
/**
 * Jump if Greater Than or Equal to
 *
 * @author Tom Morton
 */
class Jge extends \Tacit\Instruction\Branch\Jmp {

	public $command = 'JGE';

	public function execute($vm)
	{
		$left = $vm->stack->pop();
		$right = $vm->stack->pop();
		$vm->pointer++;
		if($left >= $right) {
			$vm->pointer = $vm->getByte();
		}
	}

}

