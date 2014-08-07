<?php namespace Choi\Tmdb;

abstract class Base {

	protected $api_key;
	protected $config = array();

	/**
	 * Constructor
	 *
	 * @param   string  $api_key
	 * @return  void
	 */
	public function __construct($api_key)
	{
		$this->api_key = $api_key;
	}

	/**
	 * Helper getter
	 *
	 * @param   string  $helper
	 * @return  Choi\Tmdb\Helper\Helper|bool
	 */
	public function helper($helper)
	{
		$class_name = ucfirst(strtolower($helper));
		$class      = 'Choi\\Tmdb\\Helper\\'.$class_name;

		if(!class_exists($class))
		{
			return false;
		}

		return $class::getInstance();
	}

	/**
	 * Configuration getter
	 *
	 * @param   string  $key
	 * @return  string|bool
	 */
	public function getConfig($key)
	{
		// If config haven't been fetched already we'll fetch it
		if(!$this->config)
		{
			$response     = $this->call('configuration');
			$this->config = $response->toArray();
		}

		return $this->helper('arr')->get($this->config, $key, false);
	}

	/**
	 * URL Caller
	 *
	 * @param   string  $uri
	 * @param   [array  $data]
	 * @return  array
	 */
	protected function call($uri, array $data = array())
	{
		$data['api_key'] = $this->api_key;

		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL            => 'http://api.themoviedb.org/3/'.$uri.'?'.http_build_query($data),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER         => false,
			CURLOPT_HTTPHEADER     => array(
				'Accept: application/json',
			),
		));
		$response = curl_exec($ch);
		curl_close($ch);

		return new Response($response);
	}

}
