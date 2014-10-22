<?php
namespace Tacit\Memory;
class Block {

	protected $data;
	protected $protected;
	protected $address;

	public function __construct($address, array $data) {
		$this->address = $address;
		$this->data = $data;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function isProtected()
	{
		return (bool) $this->protected;
	}

	public function protect()
	{
		$this->protected = true;
	}

	public function unprotect()
	{
		$this->protected = false;
	}

	public function getSize()
	{
		return count($this->data);
	}

	public function getData()
	{
		return $this->data;
	}

}