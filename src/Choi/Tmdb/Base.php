<?php namespace Choi\Tmdb;

abstract class Base {

	protected $api_key;
	protected $config = array();

	/**
	 * Constructor
	 *
	 * @param   String  $api_key
	 * @return  void
	 */
	public function __construct($api_key)
	{
		$this->api_key = $api_key;
	}

	/**
	 * Constructor
	 *
	 * @param   void
	 * @return  void
	 */
	public function getConfig()
	{
		// If already a config stored, we won't fetch it again
		if($config)
		{
			return;
		}

		$response = $this->call('configuration');
		var_dump($response);
	}

	/**
	 * URL Caller
	 *
	 * @param   String  $uri
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
