<?php
require("base.php");

/**
 * I chose GET to use over POST mainly because of the simplicity of this program.
 * While the parameters are shown on the browser's URL
 * with GET, security isn't an issue with this small program.
 */
extract($_GET);

if (!empty($name) && !empty($director) && !empty($rating)) {

    $movie = new Movie($name, $director, $artists, $genre, $rating);

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
