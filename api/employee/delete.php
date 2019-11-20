<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include files
include_once '../config/database.php';
include_once '../objects/employee.php';
include_once '../repository/employee_repository.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate employee repository
$employeeRepository = new EmployeeRepository($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// get employee id
$employeeId = htmlspecialchars(strip_tags($data->id));

if($employeeRepository->delete($employeeId)){
    echo json_encode([
        "message" => "Employee was deleted."
    ]);
} else {
    echo json_encode([
        "message" => "Unable to delete employee."
    ]);
}
