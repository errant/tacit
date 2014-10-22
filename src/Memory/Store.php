<?php
namespace Tacit\Memory;
class Store {

	protected $max;
	protected $size = 0;

	protected $store = array();

	/**
	 * @param integer $max
	 */
	public function __construct($max) {
		$this->max = $max;
	}

	public function getLimit()
	{
		return $this->max;
	}

	public function getSize()
	{
		return $this->size;
	}

	public function store($address, $data)
	{
		$this->reserveBytes(count($data));

		if($address > $this->max - 1) {
			throw new \Exception('Memory address invalid');
		}

		if($address === NULL) {
			$address = mt_rand(0, $this->max - 1);
			while(array_key_exists($address, $this->store)) {
				$address = mt_rand(0, $this->max - 1);
			}
		} elseif(array_key_exists($address, $this->store) && $this->store[$address]->isProtected()) {
			throw new \Exception('Unable to overwrite protected memory space');
		}

		$block = new Block($address, $data);
		$this->store[$address] = $block;

		return $block;
	}

	public function get($address)
	{
		if(!array_key_exists($address, $this->store)) {
			throw new \Exception('Empty address');
		}

		return $this->store[$address];
	}

	public function free($address)
	{
		$block = $this->get($address);
		unset($this->store[$address]);
		$this->releaseBytes($block->getSize());
	}

	/**
	 * @param integer $number
	 */
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

}