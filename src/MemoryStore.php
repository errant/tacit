<?php
namespace Tacit;
class MemoryStore {

	protected $max;
	protected $size = 0;

	public function __construct($max) {
		$this->max = $max;
	}

	public function getSize()
	{
		return $this->size;
	}

	public function reserveBytes($number)
	{
		if(($this->size + $number) > $this->max) {
			throw new \Exception('Out of Memory Error');
		}

		$this->size += $number;		
	}

	public function releaseBytes($number)
	{
		$this->size -= $number;
		if($this->size < 0) {
			$this->size = 0;
		}
	}

	public function free()
	{
		return ($this->max - $this->size);
	}
}