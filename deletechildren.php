<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {
        
        $sql = "DELETE from children where id=". $_GET['id'] . ";";
        echo $sql;
        //$row = mysqli_fetch_array($result);
        $result = mysqli_query($conn,$sql);


        // boostrap confirmation message
        $data['content'] .= "<div class='alert alert-success' role='alert'>Child deleted successfully</div>";
    
    // redirect
    header("Location: children.php");

   } else {
      header("Location: index.php");
   }

?>
