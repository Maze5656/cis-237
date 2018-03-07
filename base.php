<?php
/*
    File contains functions used repeatedly in the program,
    as well as the document's root location.
*/

require("FileMovieManager.php");
require("Movie.php");
require("HTMLPage.php");
require("Alert.php");
require("FileOpenException.php");
require("FileWriteException.php");
require("FileCloseException.php");

// Get the root directory
$document_root = $_SERVER['DOCUMENT_ROOT'];
$path = "$document_root/../movieLog.txt";

// define a template alert message
//$alert = '<div class="alert alert-%s" role="alert">%s</div>';

/**
*   Print formatted arrays.
*   @param array $array
*/
if (!function_exists('printArray')) {
    function printArray(array $array)
    {
        echo '<pre>' . print_r($array, true) . '</pre>';
    }
}

//----- Old functions kept for referrence purposes. I can delete if requested -----
//
///**
//*   Writes to a file.
//*   @param string $file - path to the file
//*   @param string $content - string to write to the file
//*   @return bool
//*/
//function writeToFile(string $file, string $content) : bool {
//    $fp = fopen($file, 'ab');
//    if (!$fp) {
//        return false;
//    }
//    if (!fwrite($fp, $content)) {
//        return false;
//    }
//    if (!fclose($fp)) {
//        return false;
//    }
//    return true;
//}
//
///**
//*   Reads from a file
//*   @param string $file - path to the file
//*   @return string
//*/
//function readFromFile(String $file) : String {
//    // get the user's movie data
//    $list = file_get_contents($file);
//
//    // format the data for placement in a table
//    $movie_log = explode("\n", trim($list));
//    $table_body = '';
//
//    foreach($movie_log as $entry) {
//        $movie = explode(',', trim($entry));
//            $table_body .= '<tr>';
//            $table_body .= '<td>' . $movie[0] . '</td>';
//            $table_body .= '<td>' . $movie[1] . '</td>';
//            $table_body .= '<td>' . $movie[2] . '</td>';
//            $table_body .= '<td>' . $movie[3] . '</td>';
//            $table_body .= '<td>' . $movie[4] . '</td>';
//            $table_body .= '</tr>';
//    }
//    return $table_body;
//}

?>