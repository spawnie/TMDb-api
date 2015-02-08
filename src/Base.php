<?php namespace Choi\TmdbApi;

use GuzzleHttp\Client;

abstract class Base {

	/**
	 * TMDb API Base URL
	 *
	 * @var string
	 */
	private $baseUrl = 'http://api.themoviedb.org/3';

	/**
	 * Config object
	 *
	 * @var Config
	 */
	protected $config;

	/**
	 * Constructor
	 *
	 * @param  Config $config
	 * @return void
	 */
	public function __construct(Config $config)
	{
		$this->config = $config;
	}

	/**
	 * Call TMDb API
	 *
	 * @param  string $uri
	 * @param  [array $customData = array()]
	 * @return \GuzzleHttp\Message\Response
	 */
	protected function call($uri, array $customData = array())
	{
		$defaultData = ['api_key' => $this->config->apiKey];

		$client = new Client;
		return $client->get(sprintf('%s/%s', $this->baseUrl, $uri), [
			'query' => array_merge($defaultData, $customData)
		]);
	}

}
