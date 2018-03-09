<?php

class HTMLPage {
    private $head = <<<EOT
        <head>
            <meta charset="utf-8">
            <title>Movie Log</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/styles.css">
        </head>
EOT;

    private $body = '';

    private $nav = <<<EOT
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        Movie Log
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">New Movie</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="list.php">All Movies</a></li>
                </ul>
            </div>
        </nav>
EOT;

    function setHead($head) {
        $this->head = $head;
    }

    function setNav($nav) {
        $this->nav = $nav;
    }

    function setBody($body) {
        $this->body = <<<EOT
        <body class="bg-img">
            $this->nav
            $body
        </body>
EOT;
    }

    function printPage() {
        echo <<<EOT
        <!DOCTYPE html>
        <html>
            $this->head
            $this->body
        <html>
EOT;
    }
}

$htmlPage = new HTMLPage();

?>