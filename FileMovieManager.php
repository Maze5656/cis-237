<?php

require ("MovieManagerInterface.php");

class FileMovieManager implements MovieManagerInterface {

    private $path = '';

    function __construct(string $path) {
        $this->path = $path;
    }

    /**
    *   Writes to a file.
    *   @param string $file - path to the file
    *   @param string $content - string to write to the file
    *   @return bool
    */
    function create(Movie $movie) : bool {
        $fp = fopen($this->path, 'ab');
        if (!$fp) {
            return false;
        }
        echo "\nI'm in the create() function: " . $movie->movieName; // nothing
        $content = "$movie->movieName, $movie->director, $movie->artists, $movie->genre, $movie->rating\n";
        echo $content . "This was the content.";
        if (!fwrite($fp, $content)) {
            return false;
        }
        if (!fclose($fp)) {
            return false;
        }
        return true;
    }

    /**
    *   Reads from a file
    *   @param string $file - path to the file
    *   @return string
    */
    function read() : String {
        // get the user's movie data
        $list = file_get_contents($this->path);

        // format the data for placement in a table
        $movie_log = explode("\n", trim($list));
        $table_body = '';

        foreach($movie_log as $entry) {
            $movie = explode(',', trim($entry));
                $table_body .= '<tr>';
                $table_body .= '<td>' . $movie[0] . '</td>';
                $table_body .= '<td>' . $movie[1] . '</td>';
                $table_body .= '<td>' . $movie[2] . '</td>';
                $table_body .= '<td>' . $movie[3] . '</td>';
                $table_body .= '<td>' . $movie[4] . '</td>';
                $table_body .= '<td><a href="edit.php?id=' . $entry . '" class="btn btn-primary">Edit';
                $table_body .= '</tr>';
        }
        return $table_body;
    }

    function readOneById(int $id) : Movie {
        return 0;
    }

    function update(int $id, Movie $movie) : bool {
        return 0;
    }

}

$document_root = $_SERVER['DOCUMENT_ROOT'];
$path = "$document_root/../movieLog.txt";

$fileMovieManager = new FileMovieManager($path);

?>