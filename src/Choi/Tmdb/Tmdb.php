<?php namespace Choi\Tmdb;

class Tmdb {
	
	public $search;
	protected $api_key;

	/**
	 * The constructor
	 *
	 * @param   String  $api_key
	 * @return  void
	 */
	public function __construct($api_key)
	{
		$this->api_key = $api_key;
		$this->search  = new Search($api_key);
	}

}
