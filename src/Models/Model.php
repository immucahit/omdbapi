<?php


namespace OMDBAPI\Models;

use ArrayAccess;
use Carbon\Carbon;

class Model implements ArrayAccess
{
	protected array $container;
	
	public function __construct($data = [])
	{
		$this->container = $data;
	}
	
	/**
	 * @return null|Carbon
	 */
	public function getReleased(): ?Carbon
	{
		$key = 'Released';
		if ($this->offsetExists($key)) {
			return new Carbon($this->offsetGet($key));
		}
		return null;
	}
	
	public function offsetExists($offset): bool
	{
		if (is_array($offset)) {
			for ($i = 0; $i < count($offset); $i) {
				if (!isset($this->container[$offset[$i]])) {
					return false;
				}
			}
			return true;
		}
		return isset($this->container[$offset]);
	}
	
	public function offsetGet($offset)
	{
		return $this->offsetExists($offset) ? $this->container[$offset] : null;
	}
	
	/**
	 * @return null|array
	 */
	public function getCountry(): ?array
	{
		$key = 'Country';
		if ($this->offsetExists($key)) {
			return $this->stringToArray($this->offsetGet($key));
		}
		return null;
	}
	
	protected function stringToArray(string $string, string $delimiter = ','): array
	{
		$array = explode($delimiter, $string);
		for ($i = 0; $i < count($array); $i++) {
			$array[$i] = trim($array[$i]);
		}
		return $array;
	}
	
	/**
	 * @return int|null
	 */
	public function getRuntime(): ?int
	{
		$key = 'Runtime';
		if ($this->offsetExists($key)) {
			if ($this->offsetGet($key) == 'N\A') {
				return null;
			}
			$matches = null;
			if (preg_match("/\d+/i", $this->offsetGet($key), $matches)) {
				return $matches[0];
			}
			return null;
		}
		return null;
	}
	
	/**
	 * @return array
	 */
	public function getGenre(): ?array
	{
		$key = 'Genre';
		if ($this->offsetExists($key)) {
			return $this->stringToArray($this->offsetGet($key));
		}
		return null;
	}
	
	/**
	 * @return string
	 */
	public function getDirector(): ?string
	{
		$key = 'Director';
		if ($this->offsetExists($key)) {
			return $this->offsetGet($key);
		}
		return null;
	}
	
	/**
	 * @return array
	 */
	public function getWriter(): ?array
	{
		$key = 'Writer';
		if ($this->offsetExists($key)) {
			return $this->stringToArray($this->offsetGet($key));
		}
		return null;
	}
	
	/**
	 * @return array
	 */
	public function getActors(): ?array
	{
		$key = 'Actors';
		if ($this->offsetExists($key)) {
			return $this->stringToArray($this->offsetGet($key));
		}
		return null;
	}
	
	/**
	 * @return array
	 */
	public function getLanguage(): ?array
	{
		$key = 'Lanugage';
		if ($this->offsetExists($key)) {
			return $this->stringToArray($this->offsetGet($key));
		}
		return null;
	}
	
	/**
	 * @return int
	 */
	public function getImdbVotes(): ?int
	{
		$key = 'imdbVotes';
		if ($this->offsetExists($key)) {
			return (int)$this->offsetGet($key);
		}
		return null;
	}
	
	public function offsetSet($offset, $value)
	{
		if (is_null($offset)) {
			$this->container[] = $value;
		} else {
			$this->container[$offset] = $value;
		}
	}
	
	public function offsetUnset($offset)
	{
		unset($this->container[$offset]);
	}
	
	/**
	 * @return null|Carbon
	 */
	public function getDvd(): ?Carbon
	{
		$key = 'DVD';
		if ($this->offsetExists($key)) {
			return new Carbon($this->offsetGet($key));
		}
		return null;
	}
}