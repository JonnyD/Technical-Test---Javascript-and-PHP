<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include files
include_once '../config/database.php';
include_once '../objects/employee.php';
include_once '../objects/company.php';
include_once '../repository/employee_repository.php';
include_once '../repository/company_repository.php';

// instantiate database
$database = new Database();
$db = $database->getConnection();

// instantiate employee repository
$employeeRepository = new EmployeeRepository($db);

// instantiate company repository
$companyRepository = new CompanyRepository($db);

// get company ID
$companyId = isset($_GET['company_id']) ? $_GET['company_id'] : null;

// get order by
$orderBy = isset($_GET['order_by']) ? $_GET['order_by'] : null;

// query employees
if ($companyId != "All" && $companyId != null) {
    $employees = $employeeRepository->readByCompany($companyId, $orderBy);
} else {
    $employees = $employeeRepository->read($orderBy);
}

// check if more than 0 records found
if(count($employees) > 0) {
    $employeesArray = [];

    foreach ($employees as $employee) {
        $company = $companyRepository->readOne($employee->getCompanyId());

        $employeesArr[] = [
            'id' => $employee->getId(),
            'first_name' => $employee->getFirstName(),
            'last_name' => $employee->getLastName(),
            'job_title' => $employee->getJobTitle(),
            'email' => $employee->getEmail(),
            'phone' => $employee->getPhone(),
            'address_line_1' => $employee->getAddressLine1(),
            'address_line_2' => $employee->getAddressLine2(),
            'town_city' => $employee->getTownCity(),
            'county_region' => $employee->getCountyReqion(),
            'country' => $employee->getCountry(),
            'postcode' => $employee->getPostcode(),
            'company' => [
                'id' => $company->getId(),
                'name' => $company->getName()
            ]
        ];
    }

    header("HTTP/1.1 200");
    echo json_encode($employeesArr);
} else {
    header("HTTP/1.1 404");
    echo json_encode([
        "message" => "No employees found."
    ]);
}
?>
