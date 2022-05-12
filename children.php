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
      <a href="addchild.php" class="btn btn-primary mb-2">Add Child</a>
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
         // $nutrition_data = array();
         // if (!empty($row["nutrition_data"])) {
         //    $nutrition_data = json_decode($row["nutrition_data"], true);
         // }
         // $fat = ($nutrition_data["totalNutrients"]["FAT"] ?? array());
         // $carbs = ($nutrition_data["totalNutrients"]["CHOCDF"] ?? array());
         // $protein = ($nutrition_data["totalNutrients"]["PROCNT"] ?? array());

         $data['content'] .= "<tr>
            <td> {$row["name"]} </td>
            <td> {$row["special_requirements"]} </td>

            <td><a href='editchild.php?id=".$row['id']."'>Edit</a> | <a href='deletechild.php?id=".$row['id']."'>Delete</td>
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
