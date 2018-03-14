<?php
require_once '../dbconfig.php';
require_once '../Models/Customer.cls.php';
session_start();
$refMember = $_SESSION["RefUser"];



if (isset($_GET["btnUpInfo"])) {
    $addr = $_GET["txtAddr"];
    $pCode = $_GET["txtPCode"];
    $phn = $_GET["txtPhone"];
    $eml = $_GET["txtEmail"];
    
    
    $cust = new Customer();
    $cust->setRefMember($refMember);
    $cust->setAddress($addr);
    $cust->setPostCode($pCode);
    $cust->setPhone($phn);
    $cust->setEmail($eml);
    
    $result = $cust->updateCustomer($myCon);
    header( 'Location: ../profile.php' ) ;
}
if (isset($_GET["btnUpPass"])) {
    $uId = $_GET["txtUId"];
    $pwd1 = $_GET["txtPwd1"];
    $pwd2 = $_GET["txtPwd2"];
    
    if ($pwd1==$pwd2) {
        $cust = new Customer();
        $cust->setRefMember($refMember);
        $cust->setCId($uId);
        $cust->setPwd($pwd1);
        
        $result = $cust->updateCustomerPwd($myCon);
        $_SESSION["Error"]="";
        header( 'Location: ../profile.php' ) ;
    }
    else {
        $_SESSION["Error"] = "Password does not matched!";
        header( 'Location: ../profile.php' ) ;
    }
}
?>