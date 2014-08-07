<?php namespace Choi\Tmdb;

class Movie extends Base {

	private $data   = array();
	private $videos = array();

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

	public function getVideos()
	{
		if(!$this->videos)
		{
			$response     = $this->call('movie/'.$this->data['id'].'/videos');
			$response     = $response->toArray();
			$this->videos = $response['results'];
		}

		return $this->videos;
	}

}
