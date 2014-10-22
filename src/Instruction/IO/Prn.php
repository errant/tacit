<?php 
namespace Tacit\Instruction\IO;
/**
 * Print Directly to Screen
 *
 * @author Tom Morton
 */
class Prn extends \Tacit\Instruction\Type\Str {

	public $command = 'PRN';
	
	public function execute($vm)
	{
		echo $this->getString($vm) . "\n";
	}

}