<?php
require_once '../dbconfig.php';
require_once '../Models/Employee.cls.php';

if (isset($_GET["btnSubmit"])) {
    $fName = $_GET["txtFName"];
    $lName = $_GET["txtLName"];
    $addr = $_GET["txtAddress"];
    $pro = $_GET["cboProvinces"];
    $cty = $_GET["cboCities"];
    $pCode = $_GET["txtPCode"];
    $phn = $_GET["txtPhone"];
    $eml = $_GET["txtEmail"];
    $empId = $_GET["txtUId"];
    $pwd1 = $_GET["txtPwd1"];
    $pwd2 = $_GET["txtPwd2"];
    
    
    if ($pwd1==$pwd2) {
        $emp = new Employee(null, $fName, $lName, $addr, $pro, $cty, $pCode, $phn, $eml, $empId, $pwd1);
        
        $result = $emp->addEmployee($myCon);
        
        if ($result) {
            echo "The person " . $emp->getFirstName() . " is added successfully <br/>";
            echo "<a href='../employerpage.php#menu1' >Go Back</a>";
        }
        else {
            $arr = $myCon->errorInfo();
            echo "Insertion Error :" .$arr[2]. "<br/>";
            
        }
    }
    else {
        $_SESSION["Error"] = "Password does not matched!";
        header( 'Location: ../employerpage.php#menu1' ) ;
    }
    
    
}