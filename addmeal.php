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

      // build an sql statment to update the meal details
      // add meals sql

      $_POST["weight"] = (int)$_POST["weight"];
      $_POST["calories"] = (int)$_POST["calories"];

      $sql = "insert into meals (name, weight, description, calories) values ('$_POST[name]', '$_POST[weight]', '$_POST[description]', '$_POST[calories]');";

      $result = mysqli_query($conn,$sql);

      // boostrap confirmation message
      $data['content'] .= "<div class='alert alert-success' role='alert'>Meal added successfully</div>";

   }

   $data['content'] .= <<<EOD

   <h2>Add Meal</h2>
   <form name="frmeditmeal" action="" method="post">
   Name :
   <input name="name" type="text" value="" /><br/>
   Weight :
   <input name="weight" type="text" value="" /><br/>
   Description :
   <input name="description" type="text" value="" /><br/>
   Calories :
   <input name="calories" type="text" value="" /><br/>
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
