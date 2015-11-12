<?php namespace Choi\TmdbApi;

class Config {

	/**
	 * Data array
	 *
	 * @var array
	 */
	private $data;

	/**
	 * Constructor
	 *
	 * @param  array $data
	 * @return void
	 */
	public function __construct(array $data)
	{
		// Store user config
		$this->data = $data;
	}

	/**
	 * Magic getter
	 *
	 * @param  string $key
	 * @return mixed|null
	 */
	public function __get($key)
	{
		return (isset($this->data[$key])) ? $this->data[$key] : null;
	}

	/**
	 * Magic setter
	 *
	 * @param  string $key
	 * @param  mixed  $value
	 * @return void
	 */
	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}

}
