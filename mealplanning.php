<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// get_dates_for_week function
function get_dates_for_week($date) {
   $dates = array();
   // $dates[] = $date;
   for ($i=0; $i<5; $i++) {
      $dates[] = date("Y-m-d", strtotime($date . " +$i days"));
   }
   return $dates;
}

// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // if the form has been submitted
   if (isset($_POST['submit'])) {

      //TODO: store the meal planning data
      // foreach loop over $_POST
         // key = the date - example: $_POST['2022-05-23'] 
            // if (!empty($_POST['2022-05-23'] )) {
               // save an entry to the database
            // }
         // value = the meal_id
         // child_id is $_GET['id']

         // run a sql query for each date and meal_id
         // $sql = "INSERT INTO meal_planning (child_id, meal_id, date) VALUES (REPLACE_THIS, REPLACE_THIS, '2022-05-23')";

         // $result = mysql_query($sql);
      
      echo "<pre>";
      print_r($_POST);
      echo "</pre>";

      $result = mysqli_query($conn,$sql);

      // boostrap confirmation message
      $data['content'] .= "<div class='alert alert-success' role='alert'>Meal planning data saved successfully</div>";

   }
   else {

      $sql = "select * from meal_planning where child_id='". $_GET['id'] . "';";
      $result = mysqli_query($conn,$sql);

      $meal_planning_array = array();
      
      while ($meal_plan_entry = mysqli_fetch_assoc($result)) {
         $date = date("Y-m-d", strtotime($meal_plan_entry['date']));
         $meal_planning_array[$date] = $meal_plan_entry['meal_id'];
      }

      // echo "<pre>";
      // print_r($meal_planning_array);
      // echo "</pre>";

      $sql = "select * from meals;";
      $result = mysqli_query($conn,$sql);

      // get next week's dates
      $meal_dates = get_dates_for_week("next monday");

      $dates_form_fields = "";
      foreach ($meal_dates as $date)
      {

         // make select item for each meal
         $meal_options = "";
         mysqli_data_seek($result,0);
         while ($meal = mysqli_fetch_assoc($result)) {
            if ( isset($meal_planning_array[$date]) ) {
               if ($meal['id'] == $meal_planning_array[$date]) {
                  $selected = "selected";
               }
               else {
                  $selected = "";
               }
            }
            else {
               $selected = "";
            }
            $meal_options .= "<option $selected value='" . $meal['id'] . "'>" . $meal['name'] . "</option>";
         }

         // human readable date
         $human_readable_date = date("l jS F", strtotime($date));
         $dates_form_fields .= <<<EOD
         <div class='form-group'>
            <label for='$date'>$human_readable_date</label>

            <select name="$date">
               <option value=""></option>
               $meal_options
            </select>
         </div>
EOD;
      }



      $sql = "select * from children where id='". $_GET['id'] . "';";
      $result = mysqli_query($conn,$sql);
      $child = mysqli_fetch_assoc($result);


      $data['content'] = <<<EOD
      <h2>Meal Planning for {$child['name']}</h2>
      <form action="" method="post">
      {$child['name']}'s choice for...
         $dates_form_fields
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
