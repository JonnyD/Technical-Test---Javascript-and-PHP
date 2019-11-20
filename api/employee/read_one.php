<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include files
include_once '../config/database.php';
include_once '../objects/employee.php';
include_once '../objects/company.php';
include_once '../repository/employee_repository.php';
include_once '../repository/company_repository.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate employee repository
$employeeRepository = new EmployeeRepository($db);

// instantiate company repository
$companyRepository = new CompanyRepository($db);

// get ID
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id == null) {
    header("HTTP/1.1 400");
    echo json_encode([
        "message" => "You must specify an id."
    ]);
    return;
}

// read the details of employee
$employee = $employeeRepository->readOne($id);
if ($employee == null) {
    header("HTTP/1.1 404");
    echo json_encode([
        "message" => "No employee found."
    ]);
    return;
}

// read the details of company
$company = $companyRepository->readOne($employee->getCompanyId());
if ($company == null) {
    header("HTTP/1.1 404");
    echo json_encode([
        "message" => "No company found."
    ]);
    return;
}

// create array
$employeeArr = [
    "id" =>  $employee->getId(),
    "first_name" => $employee->getFirstName(),
    "last_name" => $employee->getLastName(),
    "job_title" => $employee->getJobTitle(),
    "email" => $employee->getEmail(),
    "phone" => $employee->getPhone(),
    "address_line_1" => $employee->getAddressLine1(),
    "address_line_2" => $employee->getAddressLine2(),
    "town_city" => $employee->getTownCity(),
    "county_region" => $employee->getCountyReqion(),
    "country" => $employee->getCountry(),
    "postcode" => $employee->getPostcode(),
    'company' => [
        'id' => $company->getId(),
        'name' => $company->getName()
    ]
];

header("HTTP/1.1 200");
echo json_encode($employeeArr);
