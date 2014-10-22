<?php 
namespace Tacit\Instruction\Branch;
/**
 * Jump if Greater Than
 *
 * @author Tom Morton
 */
class Jgt extends \Tacit\Instruction\Branch\Jmp {

	public $command = 'JGT';

	public function execute($vm)
	{
		$left = $vm->stack->pop();
		$right = $vm->stack->pop();
		$vm->pointer++;
		if($left > $right) {
			$vm->pointer = $vm->getByte());
		}
	}

}

