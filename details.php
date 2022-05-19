<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects all from users
      // Need to add in user session?
      $sql = "SELECT * from users;";
      //where id='". $_GET['id'] . "';"; ??

      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);


      $data['content'] .= <<<EOD
      <h2>Details</h2>
     
EOD;

      // prepare page content
      $data['content'] .= "<div class='table-responsive'>
      <table class='table' border='1'>";
      $data['content'] .= "<tr>
         <th>First Name</th>
         <th>Surname</th>
         <th>Email</th>
         <th>Mobile</th>
         <th>Email Notifications</th>
         <th>SMS Notifications</th>
         <th>Password</th>
         <th></th></tr>";

      // Display the children within the html table
      while($row = mysqli_fetch_array($result)) {

         $data['content'] .= "<tr>
            <td> {$row["first_name"]} </td>
            <td> {$row["last_name"]} </td>
            <td> {$row["email"]} </td>
            <td> {$row["mobile"]} </td>
            <td> {$row["email_notifications"]} </td>
            <td> {$row["sms_notifications"]} </td>
            <td> {$row["password"]} </td>

            <td><a href='editdetails.php?id=".$row['id']."'>Edit Details</a> </td></tr>";
      }

      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
