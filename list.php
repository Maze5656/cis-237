<?php
require("base.php");

// get the user's movie data
$list = file_get_contents($path);

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
        $table_body .= '</tr>';
}
?>

<!DOCTYPE html>
<html>
<?php require ("head.php"); ?>
   <body>
       <?php require ("nav.php"); ?>

       <div class="container">
            <div class="row">
                <table class="table">
                    <thead>

                       <tr>
                           <th>Name</th>
                           <th>Director</th>
                           <th>Artists</th>
                           <th>Genre</th>
                           <th>Rating</th>
                       </tr>
                    </thead>

                   <tbody>
                       <?php echo $table_body; ?>
                   </tbody>

               </table>
            </div>
        </div>
   </body>
</html>