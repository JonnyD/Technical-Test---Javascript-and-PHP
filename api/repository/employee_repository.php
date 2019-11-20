<?php

class EmployeeRepository
{
    /**
     * @var string
     */
    private $tableName;

    /**
     * @var PDO
     */
    private $db;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->tableName = "employee";
        $this->db = $db;
    }

    /**
     * @param string $orderBy
     * @return Employee[]
     */
    public function read(string $orderBy = null)
    {
        $query = "SELECT
                        id, 
                        first_name, 
                        last_name,
                        job_title,
                        email,
                        phone,
                        address_line_1,
                        address_line_2,
                        town_city,
                        county_region,
                        country,
                        postcode,
                        company_id
                    FROM
                        " . $this->tableName;

        if ($orderBy != null) {
            $query .= " ORDER BY " . $orderBy . " ASC";
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $employees = [];
        if($stmt->rowCount() > 0) {
            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $employee = new Employee();
                $employee->setId($row['id']);
                $employee->setFirstName($row['first_name']);
                $employee->setLastName($row['last_name']);
                $employee->setJobTitle($row['job_title']);
                $employee->setEmail($row['email']);
                $employee->setPhone($row['phone']);
                $employee->setAddressLine1($row['address_line_1']);
                $employee->setAddressLine2($row['address_line_2']);
                $employee->setTownCity($row['town_city']);
                $employee->setCountyReqion($row['county_region']);
                $employee->setCountry($row['country']);
                $employee->setPostcode($row['postcode']);
                $employee->setCompanyId($row['company_id']);

                array_push($employees, $employee);
            }
        }

        return $employees;
    }

    /**
     * @param int $companyId
     * @param string $orderBy
     * @return Employee[]
     */
    public function readByCompany(int $companyId, string $orderBy = null)
    {
        $query = "SELECT
                        id, 
                        first_name, 
                        last_name,
                        job_title,
                        email,
                        phone,
                        address_line_1,
                        address_line_2,
                        town_city,
                        county_region,
                        country,
                        postcode,
                        company_id
                    FROM
                        " . $this->tableName . "
                    WHERE company_id = :companyId";

        if ($orderBy != null) {
            $query .= " ORDER BY " . $orderBy . " ASC";
        }

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":companyId", $companyId);
        $stmt->execute();

        $employees = [];
        if($stmt->rowCount() > 0) {
            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $employee = new Employee();
                $employee->setId($row['id']);
                $employee->setFirstName($row['first_name']);
                $employee->setLastName($row['last_name']);
                $employee->setJobTitle($row['job_title']);
                $employee->setEmail($row['email']);
                $employee->setPhone($row['phone']);
                $employee->setAddressLine1($row['address_line_1']);
                $employee->setAddressLine2($row['address_line_2']);
                $employee->setTownCity($row['town_city']);
                $employee->setCountyReqion($row['county_region']);
                $employee->setCountry($row['country']);
                $employee->setPostcode($row['postcode']);
                $employee->setCompanyId($row['company_id']);

                array_push($employees, $employee);
            }
        }

        return $employees;
    }

    /**
     * @param int $id
     * @return Employee|null
     */
    public function readOne(int $id)
    {
        $query = "SELECT 
                    id,
                    first_name,
                    last_name,
                    job_title,
                    email,
                    phone,
                    address_line_1,
                    address_line_2,
                    town_city,
                    county_region,
                    country,
                    postcode,
                    company_id
				FROM " . $this->tableName . "
				WHERE id = :id
				LIMIT 0,1";

        // prepare query statement
        $stmt = $this->db->prepare($query);

        // bind selected record id
        $stmt->bindParam(":id", $id);

        // execute the query
        $stmt->execute();

        // get record details
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            // assign values to object properties
            $employee = new Employee();
            $employee->setId($row['id']);
            $employee->setFirstName($row['first_name']);
            $employee->setLastName($row['last_name']);
            $employee->setJobTitle($row['job_title']);
            $employee->setEmail($row['email']);
            $employee->setPhone($row['phone']);
            $employee->setAddressLine1($row['address_line_1']);
            $employee->setAddressLine2($row['address_line_2']);
            $employee->setTownCity($row['town_city']);
            $employee->setCountyReqion($row['county_region']);
            $employee->setCountry($row['country']);
            $employee->setPostcode($row['postcode']);
            $employee->setCompanyId($row['company_id']);

            return $employee;
        } else {
            return null;
        }
    }

    /**
     * @param Employee $employee
     * @return bool
     */
    public function create(Employee $employee)
    {
        $query = "INSERT INTO
					" . $this->tableName . "
				SET
					first_name = :first_name, 
					last_name = :last_name,
					job_title = :job_title,
					email = :email,
					phone = :phone,
					address_line_1 = :address_line_1,
					address_line_2 = :address_line_2,
					town_city = :town_city,
					county_region = :county_region,
					country = :country,
					postcode = :postcode,
					company_id = :company_id";

        // prepare query
        $stmt = $this->db->prepare($query);

        // bind values
        $firstName = $employee->getFirstName();
        $stmt->bindParam(":first_name", $firstName);
        $lastName = $employee->getLastName();
        $stmt->bindParam(":last_name", $lastName);
        $jobTitle = $employee->getJobTitle();
        $stmt->bindParam(":job_title", $jobTitle);
        $email = $employee->getEmail();
        $stmt->bindParam(":email", $email);
        $phone = $employee->getPhone();
        $stmt->bindParam(":phone", $phone);
        $addressLine1 = $employee->getAddressLine1();
        $stmt->bindParam(":address_line_1", $addressLine1);
        $addressLine2 = $employee->getAddressLine2();
        $stmt->bindParam(":address_line_2", $addressLine2);
        $townCity = $employee->getTownCity();
        $stmt->bindParam(":town_city", $townCity);
        $countyRegion = $employee->getCountyReqion();
        $stmt->bindParam(":county_region", $countyRegion);
        $country = $employee->getCountry();
        $stmt->bindParam(":country", $country);
        $postcode = $employee->getPostcode();
        $stmt->bindParam(":postcode", $postcode);
        $companyId = $employee->getCompanyId();
        $stmt->bindParam(":company_id", $companyId);

        // execute query
        if ($stmt->execute()) {
            return true;
        } else {
            echo "<pre>";
            print_r($stmt->errorInfo());
            echo "</pre>";

            return false;
        }
    }

    /**
     * @param Employee $employee
     * @return bool
     */
    public function update(Employee $employee)
    {
        $query = "UPDATE
					" . $this->tableName . "
				SET
					first_name = :first_name, 
					last_name = :last_name,
					job_title = :job_title,
					email = :email,
					phone = :phone,
					address_line_1 = :address_line_1,
					address_line_2 = :address_line_2,
					town_city = :town_city,
					county_region = :county_region,
					country = :country,
					postcode = :postcode,
					company_id = :company_id
				WHERE
					id = :id";

        // prepare query statement
        $stmt = $this->db->prepare($query);

        // bind new values
        $id = $employee->getId();
        $stmt->bindParam(':id', $id);
        $firstName = $employee->getFirstName();
        $stmt->bindParam(":first_name", $firstName);
        $lastName = $employee->getLastName();
        $stmt->bindParam(":last_name", $lastName);
        $jobTitle = $employee->getJobTitle();
        $stmt->bindParam(":job_title", $jobTitle);
        $email = $employee->getEmail();
        $stmt->bindParam(":email", $email);
        $phone = $employee->getPhone();
        $stmt->bindParam(":phone", $phone);
        $addressLine1 = $employee->getAddressLine1();
        $stmt->bindParam(":address_line_1", $addressLine1);
        $addressLine2 = $employee->getAddressLine2();
        $stmt->bindParam(":address_line_2", $addressLine2);
        $townCity = $employee->getTownCity();
        $stmt->bindParam(":town_city", $townCity);
        $countyRegion = $employee->getCountyReqion();
        $stmt->bindParam(":county_region", $countyRegion);
        $country = $employee->getCountry();
        $stmt->bindParam(":country", $country);
        $postcode = $employee->getPostcode();
        $stmt->bindParam(":postcode", $postcode);
        $companyId = $employee->getCompanyId();
        $stmt->bindParam(":company_id", $companyId);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $query = "DELETE FROM " . $this->tableName . " WHERE id = :id";

        // prepare query
        $stmt = $this->db->prepare($query);

        // bind id of record to delete
        $stmt->bindParam(':id', $id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;

    }
}