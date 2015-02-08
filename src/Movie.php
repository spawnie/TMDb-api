<?php namespace Choi\TmdbApi;

class Movie extends Base {

	/**
	 * Data array
	 *
	 * @var array
	 */
	private $data;

	/**
	 * Constructor
	 *
	 * @param  Config $config
	 * @param  array  $data
	 * @return void
	 */
	public function __construct(Config $config, array $data)
	{
		$this->config = $config;
		$this->data   = ['base' => $data];
	}

	/**
	 * Magic getter
	 *
	 * @param  string $name
	 * @return mixed|bool
	 */
	public function __get($name)
	{
		return (isset($this->data['base'][$name]))
			? $this->data['base'][$name]
			: false;
	}

	/**
	 * Get credits (cast & crew)
	 *
	 * @param  void
	 * @return array
	 */
	public function getCredits()
	{
		if(!isset($this->data['credits']))
		{
			$response = $this->call('movie/'.$this->data['base']['id'].'/credits')->json();
			$this->data['credits'] = array(
				'cast' => $response['cast'],
				'crew' => $response['crew'],
			);
		}

		return $this->data['credits'];
	}

	/**
	 * Get images (backdrops & posters)
	 *
	 * @param  void
	 * @return array
	 */
	public function getImages()
	{
		if(!isset($this->data['images']))
		{
			$response = $this->call('movie/'.$this->data['base']['id'].'/images')->json();
			$this->data['images'] = array(
				'backdrops' => $response['backdrops'],
				'posters'   => $response['posters'],
			);
		}

		return $this->data['images'];
	}

	/**
	 * Get videos
	 *
	 * @param  void
	 * @return array
	 */
	public function getVideos()
	{
		if(!isset($this->data['videos']))
		{
			$response = $this->call('movie/'.$this->data['base']['id'].'/videos')->json();
			$this->data['videos'] = $response['results'];
		}

		return $this->data['videos'];
	}

}
