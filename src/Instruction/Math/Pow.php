<?php 
namespace Tacit\Instruction\Math;
/**
 * Power
 *
 * @author Tom Morton
 */
class Pow extends \Tacit\Instruction\BinaryOperation {

	public $command = 'POW';

	public function transform($left, $right)
	{
		return pow($left, $right);
	}
}

