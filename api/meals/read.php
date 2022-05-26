<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Meals.php';

$database = new Database();
$db = $database->getConnection();
 
$items = new Meals($db);

$items->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $items->read();

if($result->num_rows > 0){    
    $itemRecords=array();
    $itemRecords["meals"]=array(); 
	while ($item = $result->fetch_assoc()) { 	
        extract($meal); 
        $itemDetails=array(
            "id" => $id,
            "name" => $name,
            "description" => $description,
			"price" => $price,
            "category_id" => $category_id,            
			"created" => $created,
            "modified" => $modified			
        ); 
        //TODO
       array_push($itemRecords["meals"], $itemDetails);
    }    
    http_response_code(200);     
    echo json_encode($itemRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No meal found.")
    );
}
