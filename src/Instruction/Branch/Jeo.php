<?php 
namespace Tacit\Instruction\Branch;
/**
 * Jump if Equal to One
 *
 * @author Tom Morton
 */
class Jeo extends \Tacit\Instruction\Branch\Jmp {

	public $command = 'JEO';

	public function execute($vm)
	{
		$vm->pointer++;
		if($vm->stack->pop() == 1) {
			$vm->pointer = $vm->getByte();
		}
	}

}

