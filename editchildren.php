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

      // build an sql statment to update the children details
      // update children sql
      $sql = "UPDATE children set name = '$_POST[name]', special_requirements = '$_POST[special_requirements]' where id = '$_POST[id]'";

      $result = mysqli_query($conn,$sql);

      // boostrap confirmation message
      $data['content'] .= "<div class='alert alert-success' role='alert'>Child updated successfully</div>";

   }
   else {

      $sql = "select * from children where id='". $_GET['id'] . "';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

      <h2>Edit Child</h2>
      <form name="frmeditchild" action="" method="post">
      <input type="hidden" name="id" value="{$row['id']}">

      Name :
      <input name="name" type="text" value="{$row['name']}" /><br/>
      Special Requirements :
      <input name="special_requirements" type="text" value="{$row['special_requirements']}" /><br/>
      <input type="submit" value="Save" name="submit"/>
      </form>
EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
