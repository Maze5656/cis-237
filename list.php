<?php require("base.php"); ?>

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
                       <?php echo readFromFile($path); ?>
                   </tbody>

               </table>
            </div>
        </div>
   </body>
</html>