<?php
require_once '../dbconfig.php';
require_once '../Models/Employee.cls.php';

if (isset($_GET["btnDelete"])) {
    $refEmp = $_GET["txtRefMem"];
    echo $refEmp;
    $emp = new Employee();
    
    $emp->setRefMember($refEmp);
    $result = $emp->deleteEmployee($myCon);    
    header( 'Location: ../employerpage.php#menu1' ) ;
}
?>