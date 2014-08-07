<?php namespace Choi\Tmdb\Helper;

abstract class Helper {

	/**
	 * Get Instance
	 *
	 * @param   void
	 * @return  Choi\Tmdb\Helper\Helper
	 */
	public static function getInstance()
	{
		return new static();
	}

}
