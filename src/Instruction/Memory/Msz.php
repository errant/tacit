<?php 
namespace Tacit\Instruction\Memory;
/**
 * Push Size of Memory Location onto Stack
 *
 * @author Tom Morton
 */
class Msz extends \Tacit\Instruction\Memory\Mld {

	public $command = 'MSZ';

	public function execute($vm)
	{
		$vm->pointer++;
		$block = $vm->memory->get(base_convert($vm->getByte(),16,10));
		$vm->stack->push($block->getSize());
	}
}