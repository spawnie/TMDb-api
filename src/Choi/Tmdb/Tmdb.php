<?php namespace Choi\Tmdb;

class Tmdb extends Base {
	
	public $search;

	/**
	 * The constructor
	 *
	 * @param   String  $api_key
	 * @return  void
	 */
	public function __construct($api_key)
	{
		parent::__construct($api_key);
		
		$this->search = new Search($api_key);
	}

}
