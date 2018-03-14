<?php
require_once '../dbconfig.php';
require_once '../Models/Employee.cls.php';
require_once '../Models/Customer.cls.php';

session_start();

$uId = $_POST["txtUser"];
$pwd = $_POST["txtPwd"];

if (isset($_POST["btnMember"])) {
   $cust = new Customer();
   $cust->setCId($uId);
   $cust->setPwd($pwd);
   $result = $cust->getCustomerByIdPwd($myCon);
   if ($result != null) {
       echo "Login Successfull";
       $_SESSION["Error"] = "";
       $_SESSION["RefUser"] = $result->getRefMember();
       $_SESSION["FirstName"] = $result->getFirstName();
       $_SESSION["LastName"] = $result->getLastName();
       header( 'Location: ../profile.php' ) ;
   }
   else {
       $_SESSION["Error"] = "User ID or Password incorrect!";
       header( 'Location: ../index.php' ) ;
   }
}

if (isset($_POST["btnEmp"])) {
    $emp = new Employee();
    $emp->setEmpId($uId);
    $emp->setPwd($pwd);
    $emp->setEmpType("Employer");
    $result = $emp->getEmployeeByIdPwd($myCon);
    if ($result != null) {
        echo "Login Successfull";
        $_SESSION["Error"] = "";
        $_SESSION["RefUser"] = $result->getRefMember();
        $_SESSION["FirstName"] = $result->getFirstName();
        $_SESSION["LastName"] = $result->getLastName();
        header( 'Location: ../employerpage.php' ) ;
    }
    else {
        $_SESSION["Error"] = "User ID or Password incorrect!";
        header( 'Location: ../adminlogin.php' ) ;
    }
}

if (isset($_POST["btnAdmin"])) {
    $emp = new Employee();
    $emp->setEmpId($uId);
    $emp->setPwd($pwd);
    $emp->setEmpType("Admin");
    $result = $emp->getEmployeeByIdPwd($myCon);
    if ($result != null) {
        echo "Login Successfull";
        $_SESSION["Error"] = "";
        $_SESSION["RefUser"] = $result->getRefMember();
        $_SESSION["FirstName"] = $result->getFirstName();
        $_SESSION["LastName"] = $result->getLastName();
        header( 'Location: ../adminpage.php' ) ;
    }
    else {
        $_SESSION["Error"] = "User ID or Password incorrect!";
        header( 'Location: ../adminlogin.php' ) ;
    }
}

?>