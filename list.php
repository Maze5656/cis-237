<?php
require("base.php");

$dataSourceStatus = $dataSource->getStatus();
$buttons = $dataSource->buttons();

try {
    $data = @$dataSource->getMovieManager()->read();
    $list = $dataSource->list($data);
} catch (FileOpenException $e) {
    $list = $e;
} catch (Exception $e) {
    $list = $e->getMessage();
}

$body = <<<EOT
   <div class="container">
        <div class="row">
        <p class="bg-info">$dataSourceStatus</p>
        $buttons
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
