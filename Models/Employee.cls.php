<?php
require_once 'Member.cls.php';

class Employee extends Member {
    private $empId;
    private $empType;
    private $pwd;
    
    public function __construct($rMember = null, $fName = null,
        $lName = null, $addr = null, $city = null, $prov = null,
        $pCode = null, $phn = null, $eml = null, $empId = null, $pwd = null)
    {
        parent::__construct($rMember, $fName,
            $lName, $addr, $city, $prov,
            $pCode, $phn, $eml);
        $this->empId = $empId;
        $this->pwd = $pwd;
    }
    
    public function getEmpId()
    {
        return $this->empId;
    }

    public function getEmpType()
    {
        return $this->empType;
    }
    
    public function getPwd()
    {
        return $this->pwd;
    }
    
    public function setEmpId($empId)
    {
        $this->empId = $empId;
    }
    
    public function setEmpType($empType)
    {
        $this->empType = $empType;
    }
    
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    public function __toString()
    {
        return  parent::__toString();
    }
    
    function addEmployee($myCon) {
        $refMember = null;
        $firstName = self::getFirstName();
        $lastName = self::getLastName();
        $addr = self::getAddress();
        $city = self::getCity();
        $province = self::getProvince();
        $pCode = self::getPostCode();
        $phone = self::getPhone();
        $email = self::getEmail();
        $empId = $this->getEmpId();
        $empType = "Admin";
        $pwd = $this->getPwd(); 
        
        $sqlStmt = "INSERT INTO employees VALUES (null,'$firstName','$lastName','$addr','$city','$province','$pCode','$phone','$email','$empId','$empType','$pwd')";
        
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function  deleteEmployee($myCon) {
        $refMember = self::getRefMember();
        $sqlStmt = "DELETE FROM employees WHERE refmember=$refMember";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function getAllEmployees ($myCon){
        $idx = 0;
        $tabOfEmployees = null;
        $sqlStmt = "SELECT * FROM employees WHERE EmpType = 'Admin'";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $emp = new Employee();
            $emp->setRefMember($oneRec["RefMember"]);
            $emp->setFirstName($oneRec["FirstName"]);
            $emp->setLastName($oneRec["LastName"]);
            $emp->setAddress($oneRec["Address"]);
            $emp->setCity($oneRec["City"]);
            $emp->setProvince($oneRec["Province"]);
            $emp->setPostCode($oneRec["PostCode"]);
            $emp->setPhone($oneRec["Phone"]);
            $emp->setEmail($oneRec["Email"]);
            $emp->setEmpId($oneRec["EmpId"]);
            $emp->setEmpType($oneRec["EmpType"]);
            $emp->setPwd($oneRec["Password"]);
            
            $tabOfEmployees[$idx++] = $emp;
        }
        return $tabOfEmployees;
    }
    
    function getEmployeeByIdPwd ($myCon){
        $eId = $this->empId;
        $pwd = $this->pwd;
        $type = $this->empType;
        $sqlStmt = "SELECT * FROM employees WHERE  EmpId = '$eId' AND Password = '$pwd' AND EmpType = '$type'";
        
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $emp = new Employee();
            $emp->setRefMember($oneRec["RefMember"]);
            $emp->setFirstName($oneRec["FirstName"]);
            $emp->setLastName($oneRec["LastName"]);
            $emp->setAddress($oneRec["Address"]);
            $emp->setCity($oneRec["City"]);
            $emp->setProvince($oneRec["Province"]);
            $emp->setPostCode($oneRec["PostCode"]);
            $emp->setPhone($oneRec["Phone"]);
            $emp->setEmail($oneRec["Email"]);
            $emp->setEmpId($oneRec["EmpId"]);
            $emp->setEmpType($oneRec["EmpType"]);
            $emp->setPwd($oneRec["Password"]);
            
            return $emp;
        }
        return null;
    }
}
?>