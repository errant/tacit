<?php 
namespace Tacit\Instruction\Math;
/**
 * Multipication
 *
 * @author Tom Morton
 */
class Mul extends \Tacit\Instruction\BinaryOperation {

	public $command = 'MUL';

	public function transform($left, $right)
	{
		return $left * $right;
	}
}

