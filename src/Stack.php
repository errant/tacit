<?php
namespace Tacit;
/**
 * Implements a basic Stack
 *
 * @author Tom Morton
 */
class Stack {

	protected $size;
	protected $stack = array();

	/**
	 * @param Memory\Store $memory
	 */
	public function __construct($memory, $stackSize=128) {

		if(!is_integer($stackSize)) {
			throw new \Exception('Stack size must be specified as an integer');
		}

		$this->size = $stackSize;
		$this->memory = $memory;
	}

	public function inspect()
	{
		return $this->stack;
	}

	public function push($value)
	{
		if(count($this->stack) >= $this->size) {
			throw new \Exception('Stack Overflow');
		}

		$this->memory->reserveBytes(count($value));

		$this->stack[] = $value;
	}

	public function pop()
	{
		if(count($this->stack) == 0) {
			throw new \Exception('Stack Empty');
		}

		$value = array_pop($this->stack);

		$this->memory->releaseBytes(count($value));

		return $value;
	}

	public function clear()
	{
		$data = $this->stack;
		$this->stack = array();
		$this->memory->releaseBytes(count($data));
		return $data;
	}

	public function describe()
	{
		return $this->stack;
	}
}