<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects all from children
      $sql = "SELECT * from children;";

      $result = mysqli_query($conn,$sql);

      $data['content'] .= <<<EOD
      <h2>Children</h2>
      <a href="addchildren.php" class="btn btn-primary mb-2">Add Child</a>
EOD;

      //TODO: Add Fat, Carbs, and Protein

      // prepare page content
      $data['content'] .= "<table class='table' border='1'>";
      $data['content'] .= "<tr>
         <th>Name</th>
         <th>Special Requirements</th>
         <th></th></tr>";


      // Display the children within the html table
      while($row = mysqli_fetch_array($result)) {


         $data['content'] .= "<tr>
            <td> {$row["name"]} </td>
            <td> {$row["special_requirements"]} </td>

            <td><a href='editchildren.php?id=".$row['id']."'>Edit</a> 
            | <a href='deletechildren.php?id=".$row['id']."'>Delete</a>
            | <a href='mealplanning.php?id=".$row['id']."'>Meal Planner</a></td>
         </tr>";
      }

      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
