<?php 
namespace Tacit\Instruction\IO;
/**
 * Output Type
 *
 * @author Tom Morton
 */
class Out extends \Tacit\Instruction\UnaryOperation {

	public $command = 'OUT';
	
	public function transform($operand, $vm)
	{
		echo $operand . "\n";
	}
}