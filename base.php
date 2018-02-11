<?php
/*
    File contains functions used repeatedly in the program,
    as well as the document's root location.
*/

// Get the root directory
$document_root = $_SERVER['DOCUMENT_ROOT'];
$path = "$document_root/../movieLog.txt";

// define a template alert message
$alert = '<div class="alert alert-%s" role="alert">%s</div>';

/**
    Print formatted arrays.
    @param array $array
*/
function printArray(array $array) {
    echo '<pre>' . print_r($array, true) . '</pre>';
}


/**
    Writes to a file.
    @param string $file - path to the file
    @param string $content - string to write to the file
    @return bool
*/
function writeToFile(string $file, string $content) : bool {
    $fp = fopen($file, 'ab');
    if (!$fp) {
        return false;
    }
    if (!fwrite($fp, $content)) {
        return false;
    }
    if (!fclose($fp)) {
        return false;
    }
    return true;
}

?>