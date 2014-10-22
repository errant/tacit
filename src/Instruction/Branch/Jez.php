<?php 
namespace Tacit\Instruction\Branch;
/**
 * Jump if Equal to Zero
 *
 * @author Tom Morton
 */
class Jez extends \Tacit\Instruction\Branch\Jmp {

	public $command = 'JEZ';

	public function execute($vm)
	{
		$vm->pointer++;
		if($vm->stack->pop() == 0) {
			$vm->pointer = $vm->getByte();
		}
	}

}

