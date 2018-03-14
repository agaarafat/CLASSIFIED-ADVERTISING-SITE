<?php
class Member {
    private $refMember;
    private $firstName;
    private $lastName;
    private $address;
    private $city;
    private $province;
    private $postCode;
    private $phone;
    private $email;
    
    public function __construct($rMember = null, $fName = null, 
        $lName = null, $addr = null, $city = null, $prov = null, 
        $pCode = null, $phn = null, $eml = null)
    {
        $this->refMember = $rMember;
        $this->firstName = $fName;
        $this->lastName = $lName;
        $this->address = $addr;
        $this->city = $city;
        $this->province = $prov;
        $this->postCode = $pCode;
        $this->phone = $phn;
        $this->email = $eml;
    }
    
    public function getRefMember()
    {
        return $this->refMember;
    }
 
    public function getFirstName()
    {
        return $this->firstName;
    }
 
    public function getLastName()
    {
        return $this->lastName;
    }
 
    public function getAddress()
    {
        return $this->address;
    }
 
    public function getCity()
    {
        return $this->city;
    }
 
    public function getProvince()
    {
        return $this->province;
    }
 
    public function getPostCode()
    {
        return $this->postCode;
    }
 
    public function getPhone()
    {
        return $this->phone;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function setRefMember($refMember)
    {
        $this->refMember = $refMember;
    }
 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
 
    public function setAddress($address)
    {
        $this->address = $address;
    }
 
    public function setCity($city)
    {
        $this->city = $city;
    }
 
    public function setProvince($province)
    {
        $this->province = $province;
    }
 
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
    }
 
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    static function header(){
        $str = "<table class='table table-bordered'><tr>";
        $str = $str."<th>First Name</th><th>Last Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Customer ID</th><th>Status</th></tr>";
        return $str;
    }
    
    static function footer(){
        return "</table>";
    }
    
    function __toString(){
        return "<td>$this->firstName</td><td>$this->lastName</td>
                <td>$this->address, <br/>$this->city, $this->province, <br/>$this->postCode</td><td>$this->phone</td><td>$this->email</td>";
    }
    
    function displayAMember() {
        $str = "<table border='1'>";
        $str = $str . "<tr><td>First Name : </td><td> $this->firstName </td></tr>";
        $str = $str . "<tr><td>Last Name : </td><td> $this->lastName </td></tr>";
        $str = $str . "<tr><td>Address : </td><td> $this->address, <br/>$this->city, $this->province, <br/>$this->postCode </td></tr>";
        $str = $str . "<tr><td>Phone : </td><td> $this->phone </td></tr>";
        $str = $str . "<tr><td>Email : </td><td> $this->email </td></tr>";
        
        return $str;
    }
}
?>