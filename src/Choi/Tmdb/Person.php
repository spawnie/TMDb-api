<?php namespace Choi\Tmdb;

class Person extends Base {

	public function __construct($api_key, $person_id)
	{

		parent::__construct($api_key);

		$personData = $this->call('person/' . $person_id);
		$personData = $personData->toArray();

		$this->personData = $personData;

	}

	public function getAdult()
	{
		return $this->personData['adult'];
	}

	public function getAlsoKnownAs()
	{
		return $this->personData['also_known_as'];
	}

	public function getBiography()
	{
		return $this->personData['biography'];
	}

	public function getBirthday()
	{
		return $this->personData['birthday'];
	}

	public function getDeathday()
	{
		return $this->personData['deathday'];
	}

	public function getHomepage()
	{
		return $this->personData['homepage'];
	}

	public function getId()
	{
		return $this->personData['id'];
	}

	public function getName()
	{
		return $this->personData['name'];
	}

	public function getPlaceOfBirth()
	{
		return $this->personData['place_of_birth'];
	}

	public function getProfilePath()
	{
		return $this->personData['profile_path'];
	}

}