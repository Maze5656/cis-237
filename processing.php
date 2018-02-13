<?php
require("base.php");

/**
 * I chose GET to use over POST mainly because of the simplicity of this program.
 * While the parameters are shown on the browser's URL
 * with GET, security isn't an issue with this small program.
 */
extract($_GET);

if (!empty($name) && !empty($director) && !empty($rating)) {
    // uppercase every word and trim white space chars
    $name = ucwords(trim($name));
    $director = ucwords(trim($director));
    // if unrequired data exists, format it
    if (!empty($artists)) {
        $artists = ucwords(trim($artists));
    }
    if (!empty($genre)) {
        $genre = ucwords(trim($genre));
    }

    // build the string of user data
    $content = "$name, $director, ";
    // did the user enter artist data?
    if (!empty($artists)) { $content .= ("$artists, ");
    } else { $content .= (" ,"); }
    // did the user enter genre data?
    if (!empty($genre)) { $content .= ("$genre, ");
    } else { $content .= (" ,"); }
    $content .= "$rating\n";

    // Set the success or fail message
    if (!writeToFile($path, $content)) {
        $message = sprintf("$alert", 'danger', "File could not be written to.");
    } else {
        $message = sprintf("$alert", 'success', "$name got saved to the movie log!");
    }
}
// Required fields not entered, set the fail message.
else {
    $message = sprintf("$alert", 'danger', "Name, Director, and a rating is required!");
}

?>

<!DOCTYPE html>
<html>
<?php require ("head.php"); ?>
   <body>
       <?php require ("nav.php"); ?>

       <div class="container">
            <div class="row">
                <?php echo $message; ?>
            </div>
        </div>

   </body>
</html>