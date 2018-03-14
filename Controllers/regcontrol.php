<?php
require_once '../dbconfig.php';
require_once '../Models/Customer.cls.php';

if (isset($_GET["btnSubmit"])) {
    $fName = $_GET["txtFName"];
    $lName = $_GET["txtLName"];
    $addr = $_GET["txtAddress"];
    $pro = $_GET["cboProvinces"];
    $cty = $_GET["cboCities"];
    $pCode = $_GET["txtPCode"];
    $phn = $_GET["txtPhone"];
    $eml = $_GET["txtEmail"];
    $uId = $_GET["txtUId"];
    $capt = $_GET["txtCaptAns"];
    $pwd1 = $_GET["txtPwd1"];
    $pwd2 = $_GET["txtPwd2"];
    
    session_start();
    
    if ($pwd1==$pwd2 && $capt == $_SESSION['myCapt'] ) {
        $pwd = $_GET["txtPwd1"];
    }
    else {
        $_SESSION["Error"] = "Password or captcha does not matched!";
        header( 'Location: ../registration.php' ) ;
    }
    
    $cust = new Customer(null, $fName, $lName, $addr, $pro, $cty, $pCode, $phn, $eml, $uId, "Pending", $pwd);
    
    $result = $cust->addCustomer($myCon);
    
    if ($result) {
        echo "The person " . $cust->getFirstName() . " is added successfully <br/>";
    }
    else {
        $arr = $myCon->errorInfo();
        echo "Insertion Error :" .$arr[2]. "<br/>";
    }
    
}