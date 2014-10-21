<?php 
namespace Tacit\Instruction\Math;
/**
 * Division
 *
 * @author Tom Morton
 */
class Div extends \Tacit\Instruction\BinaryOperation {

	public $command = 'DIV';

	public function transform($left, $right)
	{
		return $left / $right;
	}
}

