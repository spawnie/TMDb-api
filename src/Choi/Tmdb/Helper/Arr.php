<?php namespace Choi\Tmdb\Helper;

use Choi\Tmdb\Helper\Helper as Base;

class Arr extends Base {

	/**
	 * Getter
	 *
	 * @param   array   $array
	 * @param   string  $key
	 * @param   [bool   $default]
	 * @return  mixed
	 */
	public function get($array, $key, $default = null)
	{
		if(is_null($key)) return $array;

		if(isset($array[$key])) return $array[$key];

		foreach(explode('.', $key) as $segment)
		{
			if(!is_array($array) || !array_key_exists($segment, $array))
			{
				return value($default);
			}

			$array = $array[$segment];
		}

		return $array;
	}

}
