<?php 
namespace Tacit\Instruction\Math;
/**
 * Modulus
 *
 * @author Tom Morton
 */
class Mod extends \Tacit\Instruction\BinaryOperation {

	public $command = 'MOD';

	public function transform($left, $right)
	{
		return $left % $right;
	}
}

