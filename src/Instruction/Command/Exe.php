<?php 
namespace Tacit\Instruction\Command;
/**
 * Execute Current Stack as Program
 *
 * @author Tom Morton
 */
class Exe extends \Tacit\Instruction {

	public $command = 'EXE';

	public function execute($vm)
	{
		// TODO: finish this! (storing existing environment)
		$stack = $vm->stack->clear();
		$block = $vm->memory->store(NULL, $vm->bytecode);
		$vm->execution->push($block->getAddress());
		$vm->execution->push($vm->pointer);
		$vm->bytecode = $stack;
		$vm->pointer = -1;
	}
}