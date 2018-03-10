<?php

// establishes connection
class DatabaseMovieManager implements MovieManagerInterface {

    private $connection = null;
    private $host = '';
    private $username = '';
    private $passwd = '';
    private $dbname = '';

    function __construct(string $host, string $username, string $passwd, string $dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->passwd = $passwd;
        $this->dbname = $dbname;
    }

    private function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->passwd, $this->dbname);
        if ($this->connection->connect_error) {
            echo 'Error connection to ' .
                $this->dbname . '. ' .
                $this->connection->connect_errno . ': ' .
                $this->connection->connect_error;
            exit;
        }
    }

    private function disconnect() {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    function testConnection() {
        $this->connect();
        echo "I guess you're worthy. You connected to the database $this->dbname!";
        $this->disconnect();
    }

    function create(Movie $movie) : bool {
        $this->connect();
        $query = "INSERT INTO movie (title, director, artists, genre, rating) 
                  VALUES (?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($query);
        $title = $movie->movieName;
        $director = $movie->director;
        $artists = $movie->artists;
        $genre = $movie->genre;
        $rating = $movie->rating;
        $statement->bind_param('ssssi', $title, $director, $artists, $genre, $rating);
        $statement->execute();
        $this->disconnect();
        if ($statement->affected_rows > 0) {
            return true;
        }
        return false;
    }

    /**
     * Read from the database
     * @return string
     */
    function read() : string {
        $this->connect();
        $query = "SELECT * FROM movie";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $statement->bind_result($id, $title, $director, $artists, $genre, $rating);
        $returnString = '';
        while($statement->fetch()) {
            $returnString .= "$title|-|$director|-|$artists|-|$genre|-|$rating|-|$id\n";
        }
        $this->disconnect();
        return $returnString;
    }

    function readOneById(int $id) : Movie {

    }

    function update(int $id, Movie $movie) : bool {

    }
}
?>