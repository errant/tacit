<?php 
namespace Tacit\Instruction\Math;
/**
 * Subtraction
 *
 * @author Tom Morton
 */
class Add extends \Tacit\Instruction\BinaryOperation {

	public $command = 'ADD';

	public function transform($left, $right)
	{
		return $left + $right;
	}
}

