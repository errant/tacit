<?php 
namespace Tacit\Instruction\Type;
/**
 * String Type
 *
 * @author Tom Morton
 */
class Str extends \Tacit\Instruction {

	public $command = 'STR';

	public function execute($vm)
	{
		$vm->pointer++;
		$end = $vm->pointer + $vm->getByte();
		$char = "";
		while($vm->pointer < $end) {
			$vm->pointer++;
			$char .= chr($vm->getByte());
		}
		$vm->stack->push($char);
	}

	public function compile(&$bytestream, $byte, $command)
	{
		if(!isset($command['T_OPERAND'])) {
			throw new \Exception('Type string expects string as operand');
		}

		$bytestream[] = $byte;

		$stringChars = str_split($command['T_OPERAND']);

		$bytestream[] = count($stringChars);

		foreach($stringChars as $char) {
			$bytestream[] = ord($char);
		}

	}
}