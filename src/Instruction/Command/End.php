<?php 
namespace Tacit\Instruction\Command;
/**
 * End Program
 *
 * @author Tom Morton
 */
class End extends \Tacit\Instruction {

	public $command = 'END';

	public function execute($vm)
	{
		$vm->terminate();
	}
}