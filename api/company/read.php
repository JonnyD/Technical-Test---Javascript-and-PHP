<?php

// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include files
include_once '../config/database.php';
include_once '../objects/company.php';
include_once '../repository/company_repository.php';

// instantiate database
$database = new Database();
$db = $database->getConnection();

// instantiate company repository
$companyRepository = new CompanyRepository($db);

// query companies
$companies = $companyRepository->read();

// check if more than 0 records found
if(count($companies) > 0) {
    $companiesArr = [];

    foreach ($companies as $company) {
        $companiesArr[] = [
            'id' => $company->getId(),
            'name' => $company->getName()
        ];
    }

    header("HTTP/1.1 200");
    echo json_encode($companiesArr);
} else {
    header("HTTP/1.1 404");
    echo json_encode([
        "message" => "No companies found."
    ]);
}