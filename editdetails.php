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

      // build an sql statment to update the student details
      $sql = "UPDATE users set first_name ='" . $_POST['txtfirstname'] . ";";
      $sql .= "last_name ='" . $_POST['txtlastname']  . "',";
      $sql .= "email ='" . $_POST['txtemail']  . "',";
      $sql .= "mobile ='" . $_POST['txtmobile']  . "',";
      $sql .= "email_notifications ='" . $_POST['txtemailnotifications']  . "',";
      $sql .= "sms_notifications ='" . $_POST['txtsmsnotifications']  . "',";
      $sql .= "password ='" . $_POST['txtpassword']  . "' ";
      $sql .= "where id = '" . $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);

      // boostrap confirmation message
      $data['content'] .= "<div class='alert alert-success' role='alert'>Details updated successfully</div>";

   }
   else {
      // Build a SQL statment to return the student record with the id that
      // matches that of the session variable.
      $sql = "SELECT * from users where id='". $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
//       $data['content'] = <<<EOD

      // TODO: Fix form
//    <h2>My Details</h2>
//    <form name="frmdetails" action="" method="post">

//    First Name :
//    <input name="txtfirstname" type="text" value="{$row['first_name']}" /><br/>
//    Surname :
//    <input name="txtlastname" type="text"  value="{$row['last_name']}" /><br/>
//    Email :
//    <input name="txtemail" type="text"  value="{$row['email']}" /><br/>
//    Mobile :
//    <input name="txtmobile" type="text"  value="{$row['mobile']}" /><br/>
//    Email Notifications :
//    <input name="txtemailnotifications" type="text"  value="{$row['email_notifications']}" /><br/>
//    SMS Notifications :
//    <input name="txtsmsnotifications" type="text"  value="{$row['sms_notifications']}" /><br/>
//    Password :
//    <input name="txtpassword" type="text"  value="{$row['password']}" /><br/>
//    <input type="submit" value="Save" name="submit"/>
//    </form>

// EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
