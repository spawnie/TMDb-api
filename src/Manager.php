<?php namespace Choi\TmdbApi;

use Illuminate\Support\Collection;

class Manager extends Base {

	/**
	 * Load TMDb Configurations
	 *
	 * @param  void
	 * @return array
	 */
	public function loadConfig()
	{
		$response = $this->call('configuration');
		$this->config->base = $response->json();
		return $this->config->base;
	}

	/**
	 * Search Movies by Name and Year
	 *
	 * @param  string $name
	 * @param  [int   $year = null]
	 * @return \Illuminate\Support\Collection
	 */
	public function searchMovieByName($name, $year = null)
	{
		$data = ['query' => $name];

		if(!is_null($year))
		{
			$data['year'] = $year;
		}

		$response = $this->call('search/movie', $data)->json();
		return new Collection($response['results']);
	}

	/**
	 * Get Movie by TMDb ID
	 *
	 * @param  int $tmdbId
	 * @return Movie
	 */
	public function getMovieById($tmdbId)
	{
		$response = $this->call('movie/'.$tmdbId);
		return new Movie($this->config, $response->json());
	}

}
