<?php

class CompanyRepository
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
        $this->tableName = "company";
        $this->db = $db;
    }

    /**
     * @return Company[]
     */
    public function read()
    {
        $query = "SELECT
                        id, 
                        name
                    FROM
                        " . $this->tableName;

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $companies = [];
        if ($stmt->rowCount() > 0) {
            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $company = new Company();
                $company->setId($row['id']);
                $company->setName($row['name']);

                array_push($companies, $company);
            }
        }

        return $companies;
    }


    /**
     * @param int $id
     * @return Company|null
     */
    public function readOne(int $id)
    {
        $query = "SELECT 
                    id,
                    name
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

        // assign values to object properties
        $company = new Company();
        $company->setId($row['id']);
        $company->setName($row['name']);

        return $company;
    }
}