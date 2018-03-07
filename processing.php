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

        try {
            @$fileMovieManager->create($movie);
            $alert = new Alert('Error: File could not be written to.', 'danger');
        } catch (FileOpenException $e) {
            $message = $e;
        } catch (FileWriteException $e) {
            $message = $e;
        } catch (FileCloseException $e) {
            $message = $e;
        } catch (Exception $e) {
        }
    } else {
        $alert = new Alert($name . ' got saved to the movie log!', 'success');
    }
} else {
    // Required fields not entered, set the fail message.
    $alert = new Alert('Error: Name, Director, and a rating is required!', 'danger');
}

$message = $alert->show();

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
