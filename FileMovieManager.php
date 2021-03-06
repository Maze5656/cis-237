<?php

require("MovieManagerInterface.php");

class FileMovieManager implements MovieManagerInterface {

    private $path = '';

    function __construct(string $path) {
        $this->path = $path;
    }

    /**
     * Writes movie to a file.
     * @param Movie $movie
     * @return bool
     * @throws FileOpenException
     * @throws FileWriteException
     * @throws FileCloseException
     */
    function create(Movie $movie) : bool {
        $fp = fopen($this->path, 'ab');
        if (!$fp) {
            throw new FileOpenException();
        }
        $content = "$movie->movieName, $movie->director, $movie->artists, $movie->genre, $movie->rating\n";
        if (!fwrite($fp, $content)) {
            throw new FileWriteException();
        }
        if (!fclose($fp)) {
            throw new FileCloseException();
        }
        return true;
    }

    /**
     * Reads from a file
     * @return string
     * @throws FileOpenException
     */
    function read() : String {
        // get the user's movie data
        if ((!$list = file_get_contents($this->path))) {
            throw new FileOpenException();
        }

        return $list;
    }


    /**
     * Get one movie by its ID
     * @param int $id
     * @return Movie
     */
    function readOneById(int $id) : Movie {
        // find the movie using its id
        $file = new SplFileObject($this->path);
        if (!$file->eof()) {
            $file->seek($id);
            $contents = $file->current();
        }
        $contentLine = explode(',', $contents);
        $movie = new Movie($contentLine[0], $contentLine[1], $contentLine[2], $contentLine[3], (int)$contentLine[4]);

        return $movie;
    }

    /**
     * Update a single movie by id
     * @param int $id
     * @param Movie $movie
     * @return bool
     */
    function update(int $id, Movie $movie) : bool {
        // First, take movie's attributes into string
        $editedMovie = "$movie->movieName, $movie->director, $movie->artists, $movie->genre, $movie->rating\n";

        // find the place in the file where the movie was
        $file = new SplFileObject($this->path);
        if (!$file->eof()) {
            $file->seek($id);
            $oldMovie = $file->current();
        }

        // get the file contents
        $fileContents = file_get_contents($this->path);

        // replace old movie with edited movie
        $fileContents = str_replace($oldMovie, $editedMovie, $fileContents);

        // Attempt to write the edited text to the movieList.txt file
        if (file_put_contents($this->path, $fileContents)) {
            return true;
        } else {
            return false;
        }
    }
}



?>