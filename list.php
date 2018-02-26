<?php
require("base.php");

$list = $fileMovieManager->read();

$body = <<<EOT
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
                       <th colspan="2">Actions</th>
                   </tr>
                </thead>
               <tbody>
                   $list
               </tbody>
           </table>
        </div>
    </div>
EOT;

$htmlPage->setBody($body);
$htmlPage->printPage();

?>
