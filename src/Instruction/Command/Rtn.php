<?php 
namespace Tacit\Instruction\Command;
/**
 * Return
 *
 * @author Tom Morton
 */
class Rtn extends \Tacit\Instruction {

	public $command = 'RTN';

	public function execute($vm)
	{
		$vm->pointer = $vm->execution->pop();
		$location = $vm->execution->pop();
		$vm->bytecode = $vm->memory->get($location)->getData();
	}
}