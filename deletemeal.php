<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

    // redirect if meal is empty
    if (empty($_POST['meals'])) {
        // pop up error message?
        header("Location: meals.php");
    }

    // Loop over students and SQL query to delete item
    foreach($_POST['meals'] as $meal) {
        $sql = "DELETE FROM meals WHERE id = $meal";
        $result = mysqli_query($conn,$sql);
    }
    
    // redirect
    header("Location: meals.php");

   } else {
      header("Location: index.php");
   }


?>
