<?php

class Movie {

    private $movieName = '';
    private $director = '';
    private $artists = '';
    private $genre = '';
    private $rating = '';

    //constructor
    function __construct($movieName, $director, $artists, $genre, $rating) {
        $this->setMovieName($movieName);
        $this->setDirectorName($director);
        $this->setArtists($artists);
        $this->setGenre($genre);
        $this->setRating($rating);
    }

    // __get function
    function __get($attr_name) {
        return $this->$attr_name;
    }

    // set function with variable function
    function __set($attr_name, $value) {
        // in $attr_name, replace _ with " "
        $attr_name = str_replace('_', ' ', $attr_name);
        $attr_name = ucwords($attr_name);
        $attr_name = str_replace(' ', '', $attr_name);
        $function = "set$attr_name";
        //var_dump($function);
        $this->$function($value);
    }

    // Individual set functions
    function setMovieName($name) {
        $this->movieName = ucwords(trim($name));
    }

    function setDirectorName($director) {
        $this->director = ucwords(trim($director));
    }

    function setArtists($artists) {
        // Was artists entered?
        if (!empty($artists)) {
            $this->artists = ucwords(trim($artists));
        } else {
            $this->artists = "n/a";
        }
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setRating($rating) {
        $this->rating = $rating;
    }
}

?>