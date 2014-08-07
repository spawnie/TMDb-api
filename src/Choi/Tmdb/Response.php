<?php namespace Choi\Tmdb;

class Response {

	private $string;

	public function __construct($string)
	{
		$this->string = $string;
	}

	public function toArray()
	{
		return json_decode($this->string, true);
	}

	public function toJson()
	{
		return json_decode($this->string);
	}

}
