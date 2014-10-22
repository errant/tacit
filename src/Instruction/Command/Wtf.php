<?php 
namespace Tacit\Instruction\Command;
/**
 * Wait For
 *
 * @author Tom Morton
 */
class Wtf extends \Tacit\Instruction {

	public $command = 'WTF';

	public function execute($vm)
	{
		$vm->suspend();
	}
}