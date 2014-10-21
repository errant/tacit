<?php
namespace Tacit\Instruction;
/**
 * Represents a binary operation
 *
 * Pops two items from the stack, transforms them
 * and pushes the resule back onto the stack
 *
 * @author Tom Morton
 */
class BinaryOperation extends \Tacit\Instruction {

	public function execute($vm)
	{
		$left = $vm->stack->pop();
		$right = $vm->stack->pop();
		$value = $this->transform($left, $right);
		$vm->stack->push($value);
	}

	public function transform($left, $right)
	{
		return false;
	}
}