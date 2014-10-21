<?php
namespace Tacit;
class Instruction {

	public $command;

	public function execute($vm) 
	{

	}

	public function compile(&$bytestream, $byte, $command)
	{
		$bytestream[] = $byte;
	}
}