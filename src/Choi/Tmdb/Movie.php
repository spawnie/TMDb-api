<?php namespace Choi\Tmdb;

class Movie extends Base {

	private $data    = array();
	private $videos  = array();
	private $images  = array();
	private $credits = array();

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

	public function validate()
	{
		return isset($this->data['id']);
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

	public function getImages()
	{
		if(!$this->images)
		{
			$response     = $this->call('movie/'.$this->data['id'].'/images');
			$response     = $response->toArray();
			$this->images = array(
				'backdrops' => $response['backdrops'],
				'posters'   => $response['posters'],
			);
		}

		return $this->images;
	}

	public function getCredits()
	{
		if(!$this->credits)
		{
			$response = $this->call('movie/'.$this->data['id'].'/credits');
			$response = $response->toArray();
			$this->credits = array(
				'cast' => $response['cast'],
				'crew' => $response['crew'],
			);
		}

		return $this->credits;
	}

}
