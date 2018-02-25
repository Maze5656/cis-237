<?php

interface MovieManagerInterface {
    function create(Movie $movie) : bool; // create a single entry in the movie list
    function read() : string; // list all movies in the list
    function readOneById(int $id) : Movie; // get one movie by id
    function update(int $id, Movie $movie) : bool; // update move in a list based on id
}

?>