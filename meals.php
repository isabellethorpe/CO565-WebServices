<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "select * from meals;";

      $result = mysqli_query($conn,$sql);

      $data['content'] .= <<<EOD
      <h2>Meals</h2>
      <a href="addmeal.php" class="btn btn-primary mb-2">Add Meal</a>
EOD;

      // prepare page content
      $data['content'] .= "<table class='table' border='1'>";
      $data['content'] .= "<tr><th>Name</th><th>Weight (g)</th><th>Description</th><th>Calories</th><th></th></tr>";
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td> $row[name] </td><td> $row[weight] </td><td> $row[description] </td><td> $row[calories] </td><td><a href='editmeal.php?id=".$row['id']."'>Edit</a> | Delete</td></tr>";
      }

      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
