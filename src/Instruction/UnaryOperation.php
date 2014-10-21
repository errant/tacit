<?php
namespace Tacit\Instruction;
/**
 * Represents a unary operation
 *
 * Pops one item from the stack and transforms it in some way
 *
 * @author Tom Morton
 */
class UnaryOperation extends \Tacit\Instruction {

	public function execute($vm)
	{
		$operand = $vm->stack->pop();
		$this->transform($operand, $vm);
	}

	public function transform($operand, $vm)
	{

	}
}