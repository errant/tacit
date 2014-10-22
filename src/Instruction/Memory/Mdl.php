<?php 
namespace Tacit\Instruction\Memory;
/**
 * Delete Memory Location
 *
 * @author Tom Morton
 */
class Mdl extends \Tacit\Instruction\Memory\Mld {

	public $command = 'MDL';

	public function execute($vm)
	{
		$vm->pointer++;
		$vm->memory->free(base_convert($vm->getByte(),16,10));
	}
}