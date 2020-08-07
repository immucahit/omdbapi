<?php

namespace OMDBAPI\Parameters;

use OMDBAPI\ReturnType;
use function json_encode;

abstract class Parameter implements IParameter
{
	
	protected array $data;
	
	public function __constructor()
	{
		$this->data = [];
		$this->data['r'] = 'json';
	}
	
	public function toArray(): array
	{
		return $this->data;
	}
	
	public function toJSON(): string
	{
		return json_encode($this->data);
	}
}