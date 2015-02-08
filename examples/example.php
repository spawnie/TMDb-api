<?php

// Load composer dependencies
require_once realpath(__DIR__.'/../vendor/autoload.php');

// Instantiate Config-object
$config = new Choi\TmdbApi\Config(require realpath(__DIR__.'/config.php'));

// Instantiate Manager-object
$tmdb = new Choi\TmdbApi\Manager($config);

// Retrieve TMDb configurations
$tmdb->loadConfig();

// Search for Movie by Name/Title
$results = $tmdb->searchMovieByName('Fight Club');

// Retrieve Movie details
$result = $results->first();
$movie = $tmdb->getMovieById($result['id']);
$movie->getCredits();
$movie->getImages();
$movie->getVideos();

dd($movie);
