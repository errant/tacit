<?php 
namespace Tacit\Instruction\Math;
/**
 * Increment
 *
 * @author Tom Morton
 */
class Inc extends \Tacit\Instruction\UnaryOperation {

	public $command = 'INC';

	public function transform($operand, $vm)
	{
		$vm->stack->push($operand++);
	}
}

