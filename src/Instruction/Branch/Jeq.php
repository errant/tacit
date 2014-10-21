<?php 
namespace Tacit\Instruction\Branch;
/**
 * Jump if Equal to
 *
 * @author Tom Morton
 */
class Jeq extends \Tacit\Instruction\Branch\Jmp {

	public $command = 'JEQ';

	public function execute($vm)
	{
		$left = $vm->stack->pop();
		$right = $vm->stack->pop();
		$vm->pointer++;
		if($left == $right) {
			$vm->pointer = $vm->getByte();
		}
	}

}

