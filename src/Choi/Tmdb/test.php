<?php

use Choi\Tmdb\Base;
use Choi\Tmdb\Response;
use Choi\Tmdb\Person as Person;

include('Base.php');
include('Person.php');
include('Response.php');

$person = new Person('d160855c5215056371017df7b3d036dc', '287');

var_dump($person->getBiography());

?>