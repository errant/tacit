<?php 
namespace Tacit\Instruction\Math;
/**
 * Subtraction
 *
 * @author Tom Morton
 */
class Sub extends \Tacit\Instruction\BinaryOperation {

	public $command = 'SUB';

	public function transform($left, $right)
	{
		return $left - $right;
	}
}

