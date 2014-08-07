<?php namespace Choi\Tmdb;

class Search extends Base {

	/**
	 * Movie searcher
	 *
	 * @param   String  $title
	 *
	 * @param   String  $title
	 * @param   Int     $year
	 *
	 * @param   Array   $array
	 *
	 * @return  Tmdb\Response
	 */
	public function movie()
	{
		switch(func_num_args())
		{
			case 1:
				$arg = func_get_arg(0);

				switch(gettype($arg))
				{
					case 'string':
						$response = static::call('search/movie', array(
							'query' => $arg,
						));
					break;

					case 'array':
						$response = static::call('search/movie', $arg);
					break;
				}
			break;

			case 2:
				$response = static::call('search/movie', array(
					'query' => func_get_arg(0),
					'year'  => func_get_arg(1),
				));
			break;
		}

		$response = $response->toArray();

		$movies   = array();
		foreach($response['results'] as $movie)
		{
			$movies[] = new Movie($this->api_key, $movie['id']);
		}

		return $movies;
	}

}
