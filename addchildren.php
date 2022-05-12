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


      $sql = "INSERT into children (name, special_requirements) values ('$_POST[name]', '$_POST[special_requirements]');";

      $result = mysqli_query($conn,$sql);


      // redirect
      header("Location: children.php");
      // boostrap confirmation message
      $data['content'] .= "<div class='alert alert-success' role='alert'>Child added successfully</div>";
        
   }

   $data['content'] .= <<<EOD

   <h2>Add Child</h2>
   <form name="frmaddchild" action="" method="post">
   Name :
   <input name="name" type="text" value="" /><br/>
   Special Requirements :
   <input name="special_requirements" type="text" value="" /><br/>
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
