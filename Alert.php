<?php

class Alert {
    private $message = '';
    private $type = '';
    private $alert = '<div class="alert alert-%s" role="alert">%s</div>';

    function __construct($message, $type) {
        $this->message = $message;
        $this->type = $type;
    }

    public function show() {
        return sprintf("$this->alert", $this->type, $this->message);
    }
}

?>

