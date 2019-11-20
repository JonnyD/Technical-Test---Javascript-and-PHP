<?php

class Employee
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $jobTitle;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $addressLine1;

    /**
     * @var string
     */
    private $addressLine2;

    /**
     * @var string
     */
    private $townCity;

    /**
     * @var string
     */
    private $countyReqion;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $postcode;

    /**
     * @var int
     */
    private $companyId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id = null)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName = null)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName = null)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param string $jobTitle
     */
    public function setJobTitle(string $jobTitle = null)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email = null)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone = null)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param string $addressLine1
     */
    public function setAddressLine1(string $addressLine1 = null)
    {
        $this->addressLine1 = $addressLine1;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param string $addressLine2
     */
    public function setAddressLine2(string $addressLine2 = null)
    {
        $this->addressLine2 = $addressLine2;
    }

    /**
     * @return string
     */
    public function getTownCity()
    {
        return $this->townCity;
    }

    /**
     * @param string $townCity
     */
    public function setTownCity(string $townCity = null)
    {
        $this->townCity = $townCity;
    }

    /**
     * @return string
     */
    public function getCountyReqion()
    {
        return $this->countyReqion;
    }

    /**
     * @param string $countyReqion
     */
    public function setCountyReqion(string $countyReqion = null)
    {
        $this->countyReqion = $countyReqion;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country = null)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     */
    public function setPostcode(string $postcode = null)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     */
    public function setCompanyId(int $companyId = null)
    {
        $this->companyId = $companyId;
    }
}