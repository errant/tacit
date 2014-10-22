<?php 
namespace Tacit\Instruction\Type;
/**
 * String Type
 *
 * @author Tom Morton
 */
class Str extends \Tacit\Instruction {

	public $command = 'STR';

	protected function getString($vm)
	{
		$vm->pointer++;
		$end = $vm->pointer + $vm->getByte();
		$char = "";
		while($vm->pointer < $end) {
			$vm->pointer++;
			$char .= chr($vm->getByte());
		}
		return $char;
	}

	public function execute($vm)
	{
		$vm->stack->push($this->getString($vm));
	}

	public function compile(&$bytestream, $byte, $command)
	{
		if(!isset($command['T_OPERAND'])) {
			throw new \Exception('Type ' . $this->command . ' expects string as operand');
		}

		$bytestream[] = $byte;

		$stringChars = str_split($command['T_OPERAND']);

		$bytestream[] = count($stringChars);

		foreach($stringChars as $char) {
			$bytestream[] = ord($char);
		}
	}
}