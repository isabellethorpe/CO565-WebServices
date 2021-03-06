<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // if the form has been submitted
   if (isset($_POST['submit'])) {

      $search_string = $_POST["weight"] . "g " . $_POST["name"];

      $raw_data = file_get_contents("https://api.edamam.com/api/nutrition-data?app_id=f3eb346c&app_key=9cc8a7ffb18a5cbbd9e92e5272496bf6&nutrition-type=cooking&ingr=" . urlencode($search_string));

      $data_decoded = json_decode($raw_data, true);

      $_POST["weight"] = (int)$_POST["weight"];

      $sql = "insert into meals (name, weight, description, calories, nutrition_data) values ('$_POST[name]', '$_POST[weight]', '$_POST[description]', '{$data_decoded["calories"]}', '$raw_data');";

      $result = mysqli_query($conn,$sql);

      // boostrap confirmation message
      $data['content'] .= "<div class='alert alert-success' role='alert'>Meal added successfully</div>";

   }

   $data['content'] .= <<<EOD

   <h2>Add Meal</h2>
   <form name="frmeditmeal" action="" method="post">
   <div class="form-group">
   Name :
   <input name="name" type="text" value="" class="form-control"/>
   </div><br/>
   <div class="form-group">
   Weight :
   <input name="weight" type="text" value="" class="form-control"/>
   </div><br/>
   <div class="form-group">
   Description :
   <input name="description" type="text" value="" class="form-control"/>
   </div><br/>
   <input type="submit" value="Save" name="submit"/>
   </form>
EOD;

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
