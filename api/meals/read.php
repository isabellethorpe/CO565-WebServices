<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Meals.php';

$database = new Database();
$db = $database->getConnection();
 
$meals = new Meals($db);

$meals->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $meals->read();

// TODO: Item records?
if($result->num_rows > 0){    
    $mealRecords=array();
    $mealRecords["meals"]=array(); 
	while ($meal = $result->fetch_assoc()) { 	
        extract($meal); 
        $nutrition_data = json_decode($nutrition_data);
        $mealDetails=array(
            "id" => $id,
            "name" => $name,
            "weight" => $weight,
            "description" => $description,
            "calories" => $calories,            
			"nutrition_data" => $nutrition_data,
        ); 

       array_push($mealRecords["meals"], $mealDetails);
    }    
    http_response_code(200);     
    echo json_encode($mealRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No meal found.")
    );
}
