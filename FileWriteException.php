<?php


    class FileWriteException extends Exception {

        public function __toString() {
            $alert = new Alert('File could not be written to.', 'danger');
            return $alert->show();
        }

    }

?>