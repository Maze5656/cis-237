<?php

class Movie {

    private $movieName = '';
    private $directorName = '';
    private $artists = '';
    private $genre = '';
    private $rating = '';

    //constructor
    function __construct($movieName, $directorName, $artists, $genre, $rating) {
        $this->setMovieName($MovieName);
        $this->setDirectorName($directorName);
        $this->setArtists($artists);
        $this->setGenre($genre);
        $this->setRating($rating);
    }

    // __get function
    function __get($attr_name) {
        return $this->attr_name;
    }

    // __set function
    function __set($attr_name, $value) {
        $attr_name = str_replace('_', ' ', $attr_name);
        $attr_name = ucwords($attr_name);
        $attr_name = str_replace(' ', '', $attr_name);
        $function = "set$attr_name";
        var_dump($function);
        $this->$function($value);
        //$this->$attr_name = $value;
    }

    // Individual set functions
    function setMovieName($movieName) {
        // uppercase every word and trim white space chars
        $this->movieName = ucwords(trim($movieName));
    }

    function setDirectorName($directorName) {
        $this->directorName = ucwords(trim($directorName));
    }

    function setArtists($artists) {
        $this->artists = ucwords(trim($artists));
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setRating($rating) {
        $this->rating = $rating;
    }
}

?>