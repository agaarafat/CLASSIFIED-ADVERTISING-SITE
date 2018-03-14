<?php
require_once 'Member.cls.php';

class Customer extends Member {
    private $cId;
    private $pwd;
    private $status;
    
    
    public function __construct($rMember = null, $fName = null,
        $lName = null, $addr = null, $city = null, $prov = null,
        $pCode = null, $phn = null, $eml = null, $cId = null, 
        $pwd = null, $status = null)
    {
        parent::__construct($rMember, $fName,
            $lName, $addr, $city, $prov,
            $pCode, $phn, $eml);
        $this->cId = $cId;
        $this->pwd = $pwd;
        $this->status = $status;
    }
    
    public function getCId()
    {
        return $this->cId;
    }
 
    public function getPwd()
    {
        return $this->pwd;
    }
 
    public function getStatus()
    {
        return $this->status;
    }
 
    public function setCId($cId)
    {
        $this->cId = $cId;
    }
 
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }
 
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function __toString()
    {
        return  "<tr>" . parent::__toString()
        . "<td>$this->cId</td><td>$this->status</td></tr>";
    }
    
    function addCustomer($myCon) {
        $refMember = null;
        $firstName = self::getFirstName();
        $lastName = self::getLastName();
        $addr = self::getAddress();
        $city = self::getCity();
        $province = self::getProvince();
        $pCode = self::getPostCode();
        $phone = self::getPhone();
        $email = self::getEmail();
        $cId = self::getCId();
        $status = "Pending";
        $pwd = self::getPwd();
        
        $sqlStmt = "INSERT INTO members VALUES (null,'$firstName','$lastName','$addr','$city','$province','$pCode','$phone','$email','$cId','$status','$pwd')";
        
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function getAllCustomers ($myCon){
        $idx = 0;
        $sqlStmt = "SELECT * FROM members";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $cust = new Customer();
            $cust->setRefMember($oneRec["RefMember"]);
            $cust->setFirstName($oneRec["FirstName"]);
            $cust->setLastName($oneRec["LastName"]);
            $cust->setAddress($oneRec["Address"]);
            $cust->setCity($oneRec["City"]);
            $cust->setProvince($oneRec["Province"]);
            $cust->setPostCode($oneRec["PostCode"]);
            $cust->setPhone($oneRec["Phone"]);
            $cust->setEmail($oneRec["Email"]);
            $cust->setCId($oneRec["CustomerId"]);
            $cust->setStatus($oneRec["Status"]);
            $cust->setPwd($oneRec["Password"]);
            
            $tabOfCustomers[$idx++] = $cust;            
        }
        return $tabOfCustomers;
    }
    
    function getACustomer($myCon) {
        $refMember = self::getRefMember();
        $sqlStmt = "SELECT * FROM members WHERE RefMember = $refMember";
         
         foreach ($myCon->query($sqlStmt) as $oneRec) {
            $cust = new Customer();
            $cust->setRefMember($oneRec["RefMember"]);
            $cust->setFirstName($oneRec["FirstName"]);
            $cust->setLastName($oneRec["LastName"]);
            $cust->setAddress($oneRec["Address"]);
            $cust->setCity($oneRec["City"]);
            $cust->setProvince($oneRec["Province"]);
            $cust->setPostCode($oneRec["PostCode"]);
            $cust->setPhone($oneRec["Phone"]);
            $cust->setEmail($oneRec["Email"]);
            $cust->setCId($oneRec["CustomerId"]);
            $cust->setStatus($oneRec["Status"]);
            $cust->setPwd($oneRec["Password"]);
            return $cust;
        } 
        return null;
    }
    
    function getCustomerByIdPwd($myCon) {
        $cid = $this->cId;
        $pwd = $this->pwd;
        $sqlStmt = "SELECT * FROM members WHERE CustomerId = '$cid' AND Password = '$pwd'";
        
        foreach ($myCon->query($sqlStmt) as $oneRec) {
            $cust = new Customer();
            $cust->setRefMember($oneRec["RefMember"]);
            $cust->setFirstName($oneRec["FirstName"]);
            $cust->setLastName($oneRec["LastName"]);
            $cust->setAddress($oneRec["Address"]);
            $cust->setCity($oneRec["City"]);
            $cust->setProvince($oneRec["Province"]);
            $cust->setPostCode($oneRec["PostCode"]);
            $cust->setPhone($oneRec["Phone"]);
            $cust->setEmail($oneRec["Email"]);
            $cust->setCId($oneRec["CustomerId"]);
            $cust->setStatus($oneRec["Status"]);
            $cust->setPwd($oneRec["Password"]);
            return $cust;
        }
        return null;
    }
    
    function updateCustomer($myCon) {
        $refMember = self::getRefMember();
        $addr = self::getAddress();
        $pCode = self::getPostCode();
        $phone = self::getPhone();
        $email = self::getEmail();
        
        $sqlStmt = "UPDATE members SET Address= '$addr',PostCode='$pCode',Phone='$phone',Email='$email' WHERE refmember= $refMember";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function updateCustomerPwd($myCon) {
        $refMember = self::getRefMember();
        $cId = $this->cId;
        $pwd = $this->pwd;
        
        $sqlStmt = "UPDATE members SET CustomerId='$cId', Password='$pwd' WHERE refmember= $refMember";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function  cencelCustomer($myCon) {
        $refMember = self::getRefMember();
        $status = "Closed";
        $sqlStmt = "UPDATE members SET Status = '$status' WHERE refmember= $refMember";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function  DeleteCustomer($myCon) {
        $refMember = self::getRefMember();
        $sqlStmt = "DELETE FROM members WHERE refmember=$refMember";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    function authorizeCustomer($myCon) {
        $refMember = self::getRefMember();
        $status = "Active";
        
        $sqlStmt = "UPDATE members SET Status= '$status' WHERE RefMember= $refMember";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function displayAllCustomers($tabOfCust) {
        $str = $this->header();
        foreach ($tabOfCust as $oneCust) {
            $str = $str . $oneCust;
        }
        $str = $str . $this->footer();
        return $str;
    }
    
    function displayAMember() {
        $str = parent::displayAMember();
        $str = $str . "<tr><td>Customer ID : </td><td> $this->cId </td></tr>";
        $str = $str . "<tr><td>Status : </td><td> $this->status </td></tr>";
        $str = $str . "</table>";
        return $str;
    }
}
?>