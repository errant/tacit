<?php
namespace Tacit\Lexer;
/**
 * The Tac Lexer
 *
 * @author Tom Morton
 */
class Tac {

	protected static $_terminals = array(
		"/^(?P<name>[A-Z]{3})$/"  => 'T_CMD',
		"/^(?P<name>[A-Z]{3}) /"  => 'T_CMD',
		"/ (?P<name>.*)$/"		  => 'T_OPERAND'
	);

	public static function run($input)
	{
		$source = explode("\n", $input);
		$tokens = array();

		foreach($source as $line) {
			$lineTokens = array();

			foreach(self::$_terminals as $regex => $terminal) 
			{
				if(preg_match($regex, $line, $match) == 1) {
					$lineTokens[$terminal] = $match['name'];
				}
			}

			$tokens[] = $lineTokens;
		}

		return $tokens;
	}
}