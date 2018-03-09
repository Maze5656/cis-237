<?php

require("base.php");

$id = null;

if (isset($_GET) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $movie = $dataSource->getMovieManager()->readOneById($id);
}

if (isset($_POST) && !empty($_POST)) {
    extract($_POST);
    $movie = new Movie($name, $director, $artists, $genre, $rating);

    if ($dataSource->getMovieManager()->update($id, $movie)) {
        header('Location: list.php');
    }
}

//
$genres = ['Action' => null, 'Comedy' => null, 'Horror' => null, 'Romance' => null ];
$genres[trim($movie->genre)] = 'selected';

$rating = [ 1 => null, 2 => null, 3 => null, 4 => null, 5 => null ];
$rating[trim($movie->rating)] = 'checked';

$body = <<<EOT
 <div class="container">
        <div class="col-6">
            <h1 class="col-6">Edit Movie</h1>

            <form action="" method="POST" class="form-horizontal" novalidate>

                <div class="form-group required">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" value="$movie->movieName" required>
                    </div>
                </div>

                <div class="form-group required">
                    <label class="col-md-3 control-label">Director</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="director" value="$movie->director" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Artists</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="artists" value="$movie->artists">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Genre</label>
                        <div class="col-md-10">
                        <select class="custom-select" name="genre">
                            <option $genres[Action]>Actions</option>
                            <option $genres[Comedy]>Comedy</option>
                            <option $genres[Horror]>Horror</option>
                            <option $genres[Romance]>Romance</option>
                        </select>
                        </div>
                    </div>

                <div class="form-group required">
                    <label class="col-md-2 control-label">Rating</label>
                        <div class="col-md-10">
                            <input type="radio" name="rating" value="1" $rating[1] required> 1
                            <input type="radio" name="rating" value="2" $rating[2]> 2
                            <input type="radio" name="rating" value="3" $rating[3]> 3
                            <input type="radio" name="rating" value="4" $rating[4]> 4
                            <input type="radio" name="rating" value="5" $rating[5]> 5
                        </div>
                    </label>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button class="btn btn-outline-primary" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
EOT;

$htmlPage->setBody($body);
$htmlPage->printPage();

?>