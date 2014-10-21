<?php 
namespace Tacit\Instruction\IO;
/**
 * Dump Stack in Reverse
 *
 * @author Tom Morton
 */
class Dmr extends \Tacit\Instruction {

	public $command = 'DMR';
	
	public function execute($vm)
	{
		echo "-- DUMP --\n";
		$stack = array();
		try {
			while(1) {
				$stack[] = $vm->stack->pop();
			}
		} catch(\Exception $e) {
			echo implode("\n", array_reverse($stack));
			echo "\n-- FINISHED --\n";
		}
	}
}