<?php
namespace Tacit\Language;
/**
 * The Basic Tacit Instruction Set
 *
 * @author Tom Morton
 */
class Basic extends \Tacit\InstructionSet {

	public function __construct()
	{
		$this->instructions = array(
			// 0-9: Command Structure
			0x00 => new \Tacit\Instruction\Command\Exe,
			0x01 => new \Tacit\Instruction\Command\End,
			0x02 => new \Tacit\Instruction\Command\Slp,
			0x03 => new \Tacit\Instruction\Command\Wtf,
			0x04 => new \Tacit\Instruction\Command\Rtn,
			// 10-19: Data Types
			0x0A => new \Tacit\Instruction\Type\Int,
			0x0B =>	new \Tacit\Instruction\Type\Str,
			// 0x0C => new \Tacit\Instruction\IO\Bol,
			// 20-29: IO
			0x14 =>	new \Tacit\Instruction\IO\Out,
			0x15 =>	new \Tacit\Instruction\IO\Dmp,
			0x16 =>	new \Tacit\Instruction\IO\Dmr,
			0x17 =>	new \Tacit\Instruction\IO\PRN,
			// 30-39: Basic Mathematical Operators
			0x1E => new \Tacit\Instruction\Math\Add,
			0x1F => new \Tacit\Instruction\Math\Sub,
			0x20 => new \Tacit\Instruction\Math\Mul,
			0x21 => new \Tacit\Instruction\Math\Div,
			0x22 => new \Tacit\Instruction\Math\Pow,
			0x23 => new \Tacit\Instruction\Math\Mod,
			0x24 => new \Tacit\Instruction\Math\Inc,
			/*
			0x25
			0x26
			0x27
			*/
			// 40-49: Branching
			0x28 => new \Tacit\Instruction\Branch\Jmp,
			0x29 => new \Tacit\Instruction\Branch\Jeq,
			0x2A => new \Tacit\Instruction\Branch\Jlt,
			0x2B => new \Tacit\Instruction\Branch\Jle,
			0x2C => new \Tacit\Instruction\Branch\Jgt,	
			0x2D => new \Tacit\Instruction\Branch\Jge,
			0x2E => new \Tacit\Instruction\Branch\Jez,
			0x2F => new \Tacit\Instruction\Branch\Jeo,	
			/*
			0x30
			0x31
			*/		
			// 50-59: Memory Manipulation
			0x32 => new \Tacit\Instruction\Memory\Mld,
			0x33 => new \Tacit\Instruction\Memory\Msv,
			0x34 => new \Tacit\Instruction\Memory\Msz,
			0x35 => new \Tacit\Instruction\Memory\Mdl,
		);
	}
}