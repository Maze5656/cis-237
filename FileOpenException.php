<?php


    class FileOpenException extends Exception {

        public function __toString() {
            $alert = new Alert('File could not be opened.', 'danger');
            return $alert->show();
        }
    }

?>