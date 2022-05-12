<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id']) && $_SESSION['user_type'] == "admin") {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects all from meals
      $sql = "select * from meals;";

      $result = mysqli_query($conn,$sql);

      $data['content'] .= <<<EOD
      <h2>Meals</h2>
      <a href="addmeal.php" class="btn btn-primary mb-2">Add Meal</a>
EOD;

      //TODO: Add Fat, Carbs, and Protein

      // prepare page content
      $data['content'] .= "
      <div class='table-responsive'>
      <table class='table' border='1'>
      <tr>
         <th>Name</th>
         <th>Weight (g)</th>
         <th>Description</th>
         <th>Fat</th>
         <th>Carbs</th>
         <th>Protein</th>
         <th>Calories</th>
         <th></th></tr>";
      // Display the meals within the html table
      while($row = mysqli_fetch_array($result)) {
         $nutrition_data = array();
         if (!empty($row["nutrition_data"])) {
            $nutrition_data = json_decode($row["nutrition_data"], true);
         }
         $fat = ($nutrition_data["totalNutrients"]["FAT"] ?? array());
         $carbs = ($nutrition_data["totalNutrients"]["CHOCDF"] ?? array());
         $protein = ($nutrition_data["totalNutrients"]["PROCNT"] ?? array());

         $data['content'] .= "<tr>
            <td> {$row["name"]} </td>
            <td> {$row["weight"]} </td>
            <td> {$row["description"]} </td>
            <td> " . ($fat["quantity"] ?? "") . ($fat["unit"] ?? "") . "</td>
            <td> " . ($carbs["quantity"] ?? "") . ($carbs["unit"] ?? "") . "</td>
            <td> " . ($protein["quantity"] ?? "") . ($protein["unit"] ?? "") . "</td>
            <td> {$row["calories"]} </td>
            <td><a href='editmeal.php?id=".$row['id']."'>Edit</a> | <a href='deletemeal.php?id=".$row['id']."'>Delete</td>
         </tr>";
      }

      $data['content'] .= "</div></table>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
