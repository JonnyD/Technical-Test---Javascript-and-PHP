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

// set employee property values
$employee = new Employee();
$employee->setId(htmlspecialchars(strip_tags($data->id)));
$employee->setFirstName(htmlspecialchars(strip_tags($data->first_name)));
$employee->setLastName(htmlspecialchars(strip_tags($data->last_name)));
$employee->setJobTitle(htmlspecialchars(strip_tags($data->job_title)));
$employee->setEmail(htmlspecialchars(strip_tags($data->email)));
$employee->setPhone(htmlspecialchars(strip_tags($data->phone)));
$employee->setAddressLine1(htmlspecialchars(strip_tags($data->address_line_1)));
$employee->setAddressLine2(htmlspecialchars(strip_tags($data->address_line_2)));
$employee->setTownCity(htmlspecialchars(strip_tags($data->town_city)));
$employee->setCountyReqion(htmlspecialchars(strip_tags($data->county_region)));
$employee->setCountry(htmlspecialchars(strip_tags($data->country)));
$employee->setPostcode(htmlspecialchars(strip_tags($data->postcode)));
$employee->setCompanyId(htmlspecialchars(strip_tags($data->company_id)));

// execute the query
if($employeeRepository->update($employee)){
    header("HTTP/1.1 200");
    echo json_encode([
        "message" => "Employee was updated."
    ]);
} else {
    header("HTTP/1.1 403");
    echo json_encode([
        "message" => "Unable to update employee."
    ]);
}
