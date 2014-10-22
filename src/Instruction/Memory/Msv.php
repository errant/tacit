<?php 
namespace Tacit\Instruction\Memory;
/**
 * Save Current Stack to Memory Location
 *
 * @author Tom Morton
 */
class Msv extends \Tacit\Instruction\Memory\Mld {

	public $command = 'MSV';

	public function execute($vm)
	{
		$data = array($vm->stack->pop());
		$vm->pointer++;
		$vm->memory->store(base_convert($vm->getByte(),16,10), $data);
	}
}