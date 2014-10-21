<?php 
namespace Tacit\Instruction\IO;
/**
 * Dump Stack
 *
 * @author Tom Morton
 */
class Dmp extends \Tacit\Instruction {

	public $command = 'DMP';
	
	public function execute($vm)
	{
		echo "-- DUMP --\n";
		try {
			while(1) {
				echo $vm->stack->pop() . "\n";
			}
		} catch(\Exception $e) {
			echo "-- FINISHED --\n";
		}
	}
}