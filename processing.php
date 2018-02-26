<?php
require("base.php");

/**
 * I chose GET to use over POST mainly because of the simplicity of this program.
 * While the parameters are shown on the browser's URL
 * with GET, security isn't an issue with this small program.
 */
extract($_GET);

if (!empty($name) && !empty($director) && !empty($rating)) {

    echo $name;
    echo $artists;
    echo $genre;
    echo $rating;
    // this isn't working - attributes aren't being set
    $movie = new Movie($name, $director, $artists, $genre, $rating);

    /* build the string of user data
    $content = "$name, $director, ";
    // did the user enter artist data?
    if (!empty($artists)) { $content .= ("$artists, ");
    } else { $content .= (" ,"); }
    // did the user enter genre data?
    if (!empty($genre)) { $content .= ("$genre, ");
    } else { $content .= (" ,"); }
    $content .= "$rating\n"; */

    echo "I'm tyring to get the movie name: " . $movie->movieName;


    //when at this point, the object doesn't have it's attributes set...
    // Set the success or fail message
    if (!$fileMovieManager->create($movie)) {
        $message = sprintf("$alert", 'danger', "File could not be written to.");
    } else {
    // at this point, the object never gets added to the list
        $message = sprintf("$alert", 'success', "$name got saved to the movie log!");
    }
}
// Required fields not entered, set the fail message.
else {
    $message = sprintf("$alert", 'danger', "Name, Director, and a rating is required!");
}

$body = <<<EOT
   <div class="container">
        <div class="row">
            $message
        </div>
   </div>
EOT;

$htmlPage->setBody($body);
$htmlPage->printPage();

?>
