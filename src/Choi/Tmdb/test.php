<?php

use Choi\Tmdb\Base;
use Choi\Tmdb\Response;
use Choi\Tmdb\Person as Person;

include('Base.php');
include('Person.php');
include('Response.php');

$person = new Person('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '287');

var_dump($person->getBiography());

?>