<?php

require ("MovieManagerInterface.php");

class FileMovieManager implements MovieManagerInterface {

    private $path = '';

    function __construct(string $path) {
        $this->path = $path;
    }

    function create(Movie $movie) : bool {
        $fp = fopen($this->path, 'ab');
        if (!$fp) {
            return false;
        }
        $content = "$movie->movieName, $movie->directorName, $movie->artists, $movie->genre, $movie->rating";
        if (!fwrite($fp, $content)) {
            return false;
        }
        if (!fclose($fp)) {
            return false;
        }
        return true;
    }

    function read() {
        return file_get_contents($this->path);
    }

    function readOneById(int $id) : Movie {
        return;
    }

    function update(int $id, Movie $movie) : bool {
        return;
    }

}

$document_root = $_SERVER['DOCUMENT_ROOT'];
$path = "$document_root/../movieLog.txt";

$fileRecordManager = new FileRecordManager($path);

?>