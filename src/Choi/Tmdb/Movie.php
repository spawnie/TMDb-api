<?php namespace Choi\Tmdb;

class Movie extends Base {

	private $data = array();

	public function __construct($api_key, $tmdb_id)
	{
		parent::__construct($api_key);

		$response   = $this->call('movie/'.$tmdb_id);
		$this->data = $response->toArray();
	}

	public function __get($name)
	{
		return (isset($this->data[$name])) ? $this->data[$name] : false;
	}

}
