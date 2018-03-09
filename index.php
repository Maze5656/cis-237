<?php
require("base.php");

$dataSourceStatus = $dataSource->getStatus();
$buttons = $dataSource->buttons();
$source = $dataSource->getSource();

$body = <<<EOT
    <div class="container">
        <div class="col-6">
            <p class="bg-info">$dataSourceStatus</p>
            $buttons
            <h1 class="col-6">New Movie</h1>

            <form action="processing.php" method="GET" class="form-horizontal" novalidate>
            <input type="hidden" name="source" value=$source>

                <div class="form-group required">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" required>
                    </div>
                </div>

                <div class="form-group required">
                    <label class="col-md-3 control-label">Director</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="director" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Artists</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="artists">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Genre</label>
                        <div class="col-md-10">
                        <select class="custom-select" name="genre">
                            <option selected>Action</option>
                            <option selected>Comedy</option>
                            <option selected>Horror</option>
                            <option selected>Romance</option>
                        </select>
                        </div>
                    </div>

                <div class="form-group required">
                    <label class="col-md-2 control-label">Rating</label>
                        <div class="col-md-10">
                            <input type="radio" name="rating" value="1" checked required> 1
                            <input type="radio" name="rating" value="2"> 2
                            <input type="radio" name="rating" value="3"> 3
                            <input type="radio" name="rating" value="4"> 4
                            <input type="radio" name="rating" value="5"> 5
                        </div>
                    </label>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button class="btn btn-outline-primary" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
EOT;

$htmlPage->setBody($body);
$htmlPage->printPage();

/*
<!DOCTYPE html>
<html>
<?php require("head.php"); ?>

<body>
<?php require("nav.php"); ?>

<div class="container">
    <div class="col-6">
        <h1 class="col-6">New Movie</h1>

        <form action="processing.php" method="GET" class="form-horizontal" novalidate>

            <div class="form-group required">
                <label class="col-md-2 control-label">Name</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="name" required>
                </div>
            </div>

            <div class="form-group required">
                <label class="col-md-3 control-label">Director</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="director" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Artists</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="artists">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Genre</label>
                    <div class="col-md-10">
                    <select class="custom-select" name="genre">
                        <option selected>Action</option>
                        <option selected>Comedy</option>
                        <option selected>Horror</option>
                        <option selected>Romance</option>
                    </select>
                    </div>
                </div>

            <div class="form-group required">
                <label class="col-md-2 control-label">Rating</label>
                    <div class="col-md-10">
                        <input type="radio" name="rating" value="1" checked required> 1
                        <input type="radio" name="rating" value="2"> 2
                        <input type="radio" name="rating" value="3"> 3
                        <input type="radio" name="rating" value="4"> 4
                        <input type="radio" name="rating" value="5"> 5
                    </div>
                </label>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>

</body>
</html>
*/