<?php
namespace Tacit\Compiler;
/**
 * Tac Compiler
 *
 * @author Tom Morton
 */
class Tac {

	public static function run($tokens, $grammar)
	{
		$bytestream = array();
		$vectors = array();
		$targets = array();
		$i = 0;

		foreach($tokens as $command) {
			if(!isset($command['T_CMD'])) {
				throw new \Exception('Compiler Error: No command token');
			}
			if(!isset($grammar[$command['T_CMD']])) {
				throw new \Exception('Compiler Error: Missing Grammar - ' . $command['T_CMD']);
			}
			// Inc counter
			$i++;
			// Get instruction
			list($byte, $instruction) = $grammar[$command['T_CMD']];
			// 
			$vectors[$i] = count($bytestream);
			$result = $instruction->compile($bytestream, $byte, $command);
			if(is_array($result)) {
				list($target, $uuid) = $result;
				$targets[$uuid] = $i + $target;
			}
		}
		// resolve targets
		$bytestream = array_map(function($byte) use($vectors, $targets) { return array_key_exists($byte,$targets) ? $vectors[$targets[$byte]] - 1 : $byte; }, $bytestream);
		return $bytestream;
	}
}